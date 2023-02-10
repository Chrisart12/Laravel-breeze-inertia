<?php

use Carbon\Carbon;

if(!function_exists('getTimestamp')) {
	// Permet d'avoir le timestamps
	function getTimestamp()
	{
		return Carbon::now()->timestamp;
	}
}

if(!function_exists('getReservation_start')) {
	// Permet d'avoir le timestamps
	function getReservation_start($reservation_date, $reservation_time)
	{
		return Carbon::parse($reservation_date . ' ' .$reservation_time.':00');
	}
}

if(!function_exists('getReservation_end')) {
	// Permet d'avoir le timestamps
	function getReservation_end($reservation_date, $reservation_time, $reservation_duration)
	{
		return Carbon::parse($reservation_date . ' ' .$reservation_time.':00')->addHour($reservation_duration);
	}
}

if(!function_exists('getReservation_time_end')) {
	// Permet d'avoir le timestamps
	function getReservation_time_end($reservation_time, $reservation_duration)
	{
		return Carbon::parse($reservation_time)->addHour($reservation_duration)->format('H:i');
	}
}

if(!function_exists('getStrPart')) {
	//Permet de prendre le premier mot d'une phrase
	function getStrPart($string)
	{
		return substr($string, 7, -4);
	}

}


if(!function_exists('slugify')) {
	// Slugify a string
	function slugify($text)
	{
			// Strip html tags
			$text=strip_tags($text);
			// Replace non letter or digits by -
			$text = preg_replace('~[^\pL\d]+~u', '_', $text);
			// Transliterate
			setlocale(LC_ALL, 'en_US.utf8');
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
			// Remove unwanted characters
			$text = preg_replace('~[^-\w]+~', '', $text);
			// Trim
			$text = trim($text, '_');
			// Remove duplicate -
			$text = preg_replace('~-+~', '_', $text);
			// Lowercase
			$text = strtolower($text);
			// Check if it is empty
			if (empty($text)) { return 'n-a'; }
			// Return result
			return $text;
	}
}

if (!function_exists('translations')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function translations($json)
    {
        if(!file_exists($json)) {
            return [];
        }
        return json_decode(file_get_contents($json), true);
    }
	
}

if(!function_exists('formatDateTime')) {
    function formatDateTime($date){
        // $date = new Datetime($date);
        // return $date->format('d/m/Y, H:i:s');
        if ($date) {
            return Carbon::parse($date)->format('d/m/Y H:i:s');
        } else {
            return null;
        }		
        
    }
}

if(!function_exists('formatMySqlDateTime')) {
    function formatMySqlDateTime($date){
        // $date = new Datetime($date);
        // return $date->format('d/m/Y, H:i:s');
        if ($date) {
            return Carbon::parse($date)->format('Y-m-d H:i:s');
        } else {
            return null;
        }		
        
    }
}

if(!function_exists('dateTimeLessTwoHours')) {
    function dateTimeLessTwoHours($date){
        if ($date) {
            return Carbon::create($date)->subHours(2)->format('Y-m-d H:i:s');
        } else {
            return null;
        }		
        
    }
}

if(!function_exists('dateTimeNow')) {
    function dateTimeNow(){
        
        return Carbon::now()->format('Y-m-d H:i:s');

    }
}

/**
 * Perme de couper une chaine de caractères
 */
if(!function_exists('cut_string')) {
    
    function cut_string($string, int $offset, int $length)
    {
        if (strlen($string) <= $length) {
            $newString = substr($string, $offset, $length);
        } else {
            $newString = substr($string, $offset, $length) . "...";
        }

        return $newString;
        
    }
}


if(!function_exists('hours')) {
		
    function hours()
    {
        $hours = [];

        for ($i=0; $i < 24 ; $i++) { 
            $hours[] = str_pad($i, 2, 0, STR_PAD_LEFT);
        }
        return $hours;
    }
}

if(!function_exists('minutes')) {
		
    function minutes()
    {
        $minutes = [];

        for ($i=0; $i < 60 ; $i+=15) { 
            $minutes[] = str_pad($i, 2, 0, STR_PAD_LEFT);
        }
        return $minutes;
    }
}

// if(!function_exists('langue')) {
		
// 	function langue($name)
// 	{
		
// 		return $name;
// 	}
// }
