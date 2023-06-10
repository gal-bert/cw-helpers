<?php

namespace galbert\cwhelpers;

class CWString {

    public static function formatAsQueryParameter($string){
        $string = trim($string);
        $string = strtolower($string);
        return str_replace(' ', '+', $string);
    }

    //* Remove any characters positioned after a character set
    public static function removeExtensionFromString($target) {
        $text = $target;
        $text = substr($text, 0, strpos($text, "."));
        return $text;
    }

    public static function formatWhatsappUrl($number, $message) {
        return "https://wa.me/".$number."/?text=".urlencode($message);
    }

    public static function sanitizeBase64($string) {
        $string = str_replace(['/', '\\'], '', preg_replace('/<img[^>]*>/', '', $string));
        return $string;
    }
}
