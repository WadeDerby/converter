<?php

namespace Wade\Converter;

/**
* 
*/
class FiguresConverter 
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
	public function convertNumber($number){

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

    	if ($number < 0) {
    		$absValue = abs($number);
    		"Negative " . $this->convertToWords($absValue);
    	}

    	if ($number <= 20 ) {
    		//match number to words equivalent
    		$value .= $keys[$number];

    	}elseif (($number > 20) && ($number < 100)) {
    		//split number into tens and ones
    		$ones = $number % 10;
    		$tens = ($number - $ones);
    		//check if number has ones and append else return value
    		if ($ones != 0) {
    			$value .= $keys[$tens] ."-". $keys[$ones];

    		}else{
    			$value .= $keys[$tens];
    		}

    	}elseif (($number >= 100) && ($number < 1000)) {
    		//split number into hundreds and get the remainder
    		$hundreds = $number / 100;
    		$remainder = $number % 100;
    		//check if number has remainder if yes convert remainder and append to hundreds
    		if ($remainder != 0) {
    			$value .= $keys[$hundreds] ." ". $keys[100] . " and " . $this->convertToWords($remainder);
    		}else {
    			$value .= $keys[$hundreds] . " " . $keys[100];
    		}

    	}elseif ($number >= 1000 ) {
    		//get the base unit and convert number
    		$baseUnit = pow(1000, floor(log($number, 1000)));
    		$remainder = $number % $baseUnit;
    		$actualUnit = ($number - $remainder) / $baseUnit;

    		if ($remainder != 0) {
    			$value .= $this->convertToWords($actualUnit) . " " .$keys[$baseUnit];
    			$value .= $remainder < 100 ? ' and ' : ' , ';
    			$value .= $this->convertToWords($remainder);
    		}else {
    			$value .= $this->convertToWords($actualUnit) . " " .$keys[$baseUnit];
    		}

    	}

    	return $value;

	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function convertToWords($value)
	{
		$bool = $this->isConvertable($value);
		//check if number can be converted return string, else return message
		if ($bool === true) {
			$this->convertNumber($value);
		}else {
			$this->getErrorResponse($bool);
		}
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function isConvertable($number){
		//if number is convertible return true else return error code
		if (is_int($number) && ($number > (-PHP_INT_MAX - 1) ) && ($number < PHP_INT_MAX ) ) {
			return true;
		}elseif (is_null($number) || !isset($number)) {
			return 20;
		}elseif ($number > PHP_INT_MAX || $number < (-PHP_INT_MAX - 1) ) {
			return 21;
		}elseif (!is_numeric($number)) {
			return 22;
		}elseif (is_string($number) || is_object($number)) {
			return 23;
		}elseif (is_real($number) || is_float($number)) {
			return 24;
		}else {
			return 25;
		}
	}

	/**
	 * undocumented function
	 *
	 * @return void
	 * @author 
	 **/
	public function getErrorResponse($errorCode) {
		//get error code and return user friendly error message
		switch ($errorCode) {
			case 20:
				$message = "Error - null value passed";
				break;
			
			case 21:
				$message = "Error - value passed is out of bounds";
				break;
			case 22:
				$message = "Error - value passed is not numeric";
				break;

			case 23:
				$message = "Error - string or object passed expecting integer";
				break;

			case 24:
				$message = "Error - floating point passed expecting integer";
				break;

			case 25:
				$message = "Error - something went wrong ";
				break;

			default:
				$message = "Fatal Error - Value passed data type unknown ";
				break;
		}
	}
}