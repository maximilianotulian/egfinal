<?php
    namespace App\System\Helpers;

    class DateHelper{

        const MYSQL_DATE_FORMAT = 'Y-m-d H:i:s';

        public static function getNowDate(){
            return date(self::MYSQL_DATE_FORMAT);
        }

    }

 ?>
