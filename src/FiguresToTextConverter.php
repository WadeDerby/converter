<?php

namespace Wade\Converter;

/**
* 
*/
class FiguresToTextConverter 
{
	
	// function __construct($arg='')
	// {
	// 	# code...
	// }

	/**
	 * this function converts numbers (integer) to words 
	 *
	 * @return string
	 * @Wade Derby 
	 **/
	public function convertToWords($number){

		$keys  = [
	        0                   => 'zero',
	        1                   => 'one',
	        2                   => 'two',
	        3                   => 'three',
	        4                   => 'four',
	        5                   => 'five',
	        6                   => 'six',
	        7                   => 'seven',
	        8                   => 'eight',
	        9                   => 'nine',
	        10                  => 'ten',
	        11                  => 'eleven',
	        12                  => 'twelve',
	        13                  => 'thirteen',
	        14                  => 'fourteen',
	        15                  => 'fifteen',
	        16                  => 'sixteen',
	        17                  => 'seventeen',
	        18                  => 'eighteen',
	        19                  => 'nineteen',
	        20                  => 'twenty',
	        30                  => 'thirty',
	        40                  => 'fourty',
	        50                  => 'fifty',
	        60                  => 'sixty',
	        70                  => 'seventy',
	        80                  => 'eighty',
	        90                  => 'ninety',
	        100                 => 'hundred',
	        1000                => 'thousand',
	        1000000             => 'million',
	        1000000000          => 'billion',
	        1000000000000       => 'trillion',
    	];
    	$value = '';

    	if(!is_numeric($number)){
    		return 'The number is not an integer, use only integers';
    	}

    	if($number < 0){
    		$absValue = abs($number);
    		"Negative " . $this->convertToWords($absValue);
    	}

    	if($number <= 20 ){
    		$value .= $keys[$number];

    	}elseif (($number > 20) && ($number < 100)) {
    		$ones = $number % 10;
    		$tens = ($number - $ones);
    		if($ones != 0){
    			$value .= $keys[$tens] ."-". $keys[$ones];

    		}else{
    			$value .= $keys[$tens];
    		}
    	}elseif (($number >= 100) && ($number < 1000)) {
    		$hundreds = $number / 100;
    		$rest = $number % 100;
    		if($rest != 0){
    			$value .= $keys[$hundreds] ." ". $keys[100] . " and " . $this->convertToWords($rest);
    		}else{
    			$value .= $keys[$hundreds] . " " . $keys[100];
    		}
    	}elseif ($number >= 1000 ) {
    		$baseUnit = pow(1000, floor(log($number, 1000)));
    		$rest = $number % $baseUnit;
    		$unit = ($number - $rest) / $baseUnit;
    		if($rest != 0){
    			$value .= $this->convertToWords($unit) . " " .$keys[$baseUnit];
    			$value .= $rest < 100 ? ' and ' : ' , ';
    			$value .= $this->convertToWords($rest);
    			
                
    		}else{
    			$value .= $this->convertToWords($unit) . " " .$keys[$baseUnit];
    		}

    	}

    	return $value;

	}

	public function intMaxValue()
	{
		$value = PHP_INT_MAX;
		return $value;
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function convertFromWords($value)
	{
		# code...
	}
}