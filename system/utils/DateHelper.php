<?php
    namespace App\System\Helpers;

    class DateHelper{

        const MYSQL_DATE_FORMAT = 'Y-m-d H:i:s';

        public static function getNowDate(){
            return date(self::MYSQL_DATE_FORMAT);
        }

        public static function formatDateES($date){
            setlocale(LC_ALL,"es_ES");
            return date('d/m/Y',strtotime($date));
        }

    }

 ?>
