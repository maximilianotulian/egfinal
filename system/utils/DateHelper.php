<?php
    namespace App\System\Helpers;

    class DateHelper{

        const MYSQL_DATE_FORMAT = 'Y-m-d H:i:s';

        public static function getNowDate(){
            return date(self::MYSQL_DATE_FORMAT);
        }

        public static function formatDateES($date){
            setlocale(LC_ALL,"es_ES");
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            return date('d/m/Y',strtotime($date));
        }

    }

 ?>
