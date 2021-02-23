<?php

//t3keem ly el enter date of form 
// name => required , string , min 3
// email => required , email
// password => required , string , max 20
//++filer var 

$error = '';
$success = '';


// this check if input is vaildation in write print t/f
function requireInput($value)
{
	$str = trim($value);
	if (strlen($str) > 0) {
		return true;
	}else{
		return false;
	}
}

// santize string inputs
function santString($value)
{
	$str = trim($value);
	$str = filter_var($str,FILTER_SANITIZE_STRING);
	return $str; 
}


// santize email inputs
function santEmail($email)
{
	$str = trim($email);
	$str = filter_var($email,FILTER_SANITIZE_EMAIL);
	return $email; 
}


//minimum number
function minInput($value , $min)
{
	if (strlen($value) < $min) {
		return false;
	}else{
		return true;
	}
}


//maxmium number
function maxInput($value , $max)
{
	if (strlen($value) > $max) {
		return false;
	}else{
		return true;
	}
}

//vaild email
function vaildEmail($email)
{
	if(filter_var($email , FILTER_VALIDATE_EMAIL))
	{
		return true;
	}else
		return false;
}



?>
