<?php

namespace App\My;


use Carbon\Carbon;

class Util
{

    public static function dateFormat($date)
    {
        $timestamp = strtotime($date);
        setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');

        return strftime('%d de %B, %Y',$timestamp) ;
    }

    public static function dateFormatTime($date)
    {
        return date('d/m/Y H:i', strtotime($date));
    }

    public static function datetimeToDatabase($date)
    {
	$parts = explode('/',$date);
        $subParts = explode(' ', $parts[2]);
        $day = $parts[0];
        $month = $parts[1];
        $year = $subParts[0];
        $hour = $subParts[1];

	return Carbon::parse("{$year}-{$month}-{$day} {$hour}");
    }

    public static function resume($string,$caracteres = 2000, $stripTags = false) {
        $string = $stripTags ? strip_tags($string) : $string;
        if (strlen($string) > $caracteres) {
            while (substr($string,$caracteres,1) <> ' ' && ($caracteres < strlen($string))){
                $caracteres++;
            };
        };

        $return = strlen($string) >= $caracteres ? substr($string,0,$caracteres) . '...' : $string;

        return $return ;
    }


    public static function debug($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }




}
