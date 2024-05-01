<?php

namespace Core;

// Costanti
const LINK = "http://";
const SLINK = "https://";


class Validator
{
    // Trim serve per togliere gli spazi vuoti all'inizio
    public static function string($str, $min)
    {
        $str = trim($str);
        return strlen($str) > $min;
    }

    public static function email($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function password($password)
    {
        $mustValue= ['@', '!', '+', '-', '$', '&', '/', '?'];

        $isThePasswordOk = true;
        if(strlen($password) < 8 || strlen($password) >64){
            $isThePasswordOk = false;

        }
        $contValue = false;
        foreach ($mustValue as $value){
            if(str_contains($password,$value)){
                $contValue = true;
                break;
            }
        }
        if(!$contValue) $isThePasswordOk = false;


        return $isThePasswordOk;
    }

    public static function phone_number($number){
        $mustValue = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];

        $len = strlen($number);


        for ($i = 0; $i < $len; $i++) {
            if(in_array($number[$i], $mustValue)) continue;
            else return false;
        }

        return true;
    }

    public static function link($link){

        return (str_contains($link, LINK) or str_contains($link, SLINK));

    }

}