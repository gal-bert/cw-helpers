<?php

namespace galbert\cwhelpers;

class CWTime {

    public static function format($format){
        return date($format);
    }

    public static function greeting(){
        if (self::now_hour() < 12) {
            return "Good Morning";
        }
        else if (self::now_hour() < 18) {
            return "Good Afternoon";
        }
        else {
            return "Good Evening";
        }
    }

    public static function image(){
        if (self::now_hour() < 12) {
            return "morning";
        }
        else if (self::now_hour() < 18) {
            return "afternoon";
        }
        else {
            return "evening";
        }
    }

    public static function now(){
        return date('l, d F Y H:i:s');
    }

    public static function now_fulldate(){
        return date('d F Y');
    }

    public static function now_fulltime(){
        return date('H:i:s');
    }

    public static function now_hour(){
        return date('H');
    }

    public static function now_minute(){
        return date('i');
    }

    public static function now_second(){
        return date('s');
    }

    public static function now_day(){
        return date('d');
    }

    public static function now_dayName(){
        return date('l');
    }

    public static function now_month(){
        return date('m');
    }

    public static function now_monthName(){
        return date('F');
    }

    public static function now_year(){
        return date('Y');
    }



}
