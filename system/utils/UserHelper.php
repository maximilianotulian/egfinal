<?php
    namespace App\System\Helpers;

    include_once 'system/repositories/UserRepository.php';
    include_once 'DateHelper.php';
    include_once 'Flags.php';

    Use \App\System\Repositories\UserRepository as UserRepository;
    Use \App\System\Helpers\DateHelper as DateHelper;
    Use \App\System\Helpers\Flags as Flags;

    class UserHelper{

        const COOKIE_SEPARATOR = '!@&';

        public static function createUser($user){

            $errors = array();
            $userCreated = false;

            if( self::checkUsername($user['username']) ) {
                $errors[] = Flags::USERNAME_ALREADY_USED;
            }

            if ( self::checkEmail($user['email']) ) {
                $errors[] = Flags::EMAIL_ALREADY_USED;
            }

            if (!$errors){
                $cleanPassword = $user['password'];
                $user['password'] = self::hash($user['password']);
                $user['created_at'] = DateHelper::getNowDate();
                $userRepository = new UserRepository();
                $userCreated = $userRepository->add($user);
                $user['password'] = $cleanPassword;
                self::login($user);
            }

            return array(
                'errors' => $errors,
                'userCreated' => $userCreated
            );

        }

        private static function hash($password) {
            return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        }

        private static function verify($password, $hash) {
            return password_verify($password, $hash);
        }

        public static function checkUsername($username){
            $userRepository = new UserRepository();
            if ($userRepository->findByUsername($username) != null){
                return true;
            }else{
                return false;
            }
        }

        public static function checkEmail($email){
            $userRepository = new UserRepository();
            if ($userRepository->findByEmail($email) != null){
                return true;
            }else{
                return false;
            }
        }

        public static function login($user, $rememberUser = false){
            $userRepository = new UserRepository();
            $foundUser = $userRepository->findByUsername($user['username']);
            if ($foundUser){
                $foundUser = $foundUser[0];
                if (password_verify($user['password'], $foundUser['password'])) {
                    $foundUser['permissions'] = $userRepository->getUserRoles($foundUser['id']);
                    self::storeUserInSession($foundUser);
                    if($rememberUser){
                        self::rememberUser($foundUser);
                    }
                    return true;
                }else{
                    return Flags::BAD_USER_OR_PASSWORD;
                }
            }else{
                return Flags::BAD_USER_OR_PASSWORD;
            }
        }

        public static function storeUserInSession($user){
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['user'] = $user;
        }

        public static function rememberUser($user){
            $cookieString = self::hash($_SERVER['HTTP_USER_AGENT'].$user['username']);
            $user['cookie'] = $cookieString;

            $userRepository = new UserRepository();
            $userRepository->update($user);

            $cookieName = 'user';
            $cookieExpire = 2592000 + time(); //1 Month
            setcookie($cookieName, $user['username'] . self::COOKIE_SEPARATOR . $cookieString, $cookieExpire);
        }

        private static function getRandomString($stringLenght){
            $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
            $string = '';
            $strLen = strlen($characters) - 1;
            for ($i = 0; $i < $stringLenght; $i++) {
                 $string .= $characters[rand(0, $strLen)];
            }
            return $string;
        }

        public static function getLoggedUser(){
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if (isset($_SESSION['user'])){
                return $_SESSION['user'];
            }else{
                $cookieUser = self::getCookieUser();
                if($cookieUser){
                    return $cookieUser;
                }else{
                    return null;
                }
            }
        }

        private static function getCookieUser(){
            if(isset($_COOKIE['user'])){
                $cookieData = explode(self::COOKIE_SEPARATOR, $_COOKIE['user']);
                $userRepository = new userRepository();
                $foundUser = $userRepository->findByUsername($cookieData[0]);
                if ($foundUser){
                    $foundUser = $foundUser[0];
                    if (self::verify($_SERVER['HTTP_USER_AGENT'].$foundUser['username'], $foundUser['cookie'])){
                        self::storeUserInSession($foundUser);
                        return $foundUser;
                    }else{
                        return null;
                    }
                }else{
                    return null;
                }
            }else{
                return null;
            }
        }

        public static function logOut(){
            if(session_status() == PHP_SESSION_NONE){
                session_start();
            }
            if (isset($_SESSION['user'])){
                unset($_SESSION['user']);
            }
            if (isset($_COOKIE['user'])){
                unset($_COOKIE['user']);
                setcookie('user', '', time() - 3600, '/');
            }
        }

        public static function loggedUserHasPermission($permission){
            $loggedUserPermissions = self::getLoggedUser()['permissions'];
            $result = false;
            foreach ($loggedUserPermissions as $key => $userPermission) {
                if($userPermission['description'] == $permission){
                    $result = true;
                    break;
                }
            }
            return $result;
        }

    }

 ?>
