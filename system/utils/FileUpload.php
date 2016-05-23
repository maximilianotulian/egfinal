<?php
    namespace App\System\Helpers;

    class FileUpload{

        const UPLOAD_DIR = '/uploads';

        public static function uploadFile($file, $dir = ''){
            $temp_name = $file["tmp_name"];
            $name = $file["name"];

            if (!file_exists($_SERVER["DOCUMENT_ROOT"].self::UPLOAD_DIR)) {
                mkdir("uploads", 0755);
                chmod("uploads", 0755);
            }

            $length = 15;
            $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
            $extension = pathinfo($name, PATHINFO_EXTENSION);
            $name = $randomString.'.'.$extension;
            move_uploaded_file($temp_name, $_SERVER["DOCUMENT_ROOT"].self::UPLOAD_DIR."$dir$name");
            chmod($_SERVER["DOCUMENT_ROOT"].self::UPLOAD_DIR."/$dir$name", 0644); // Set read and write permissions if file
            return self::UPLOAD_DIR.$dir.$name;
        }

    }

 ?>
