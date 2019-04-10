<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function dd($val) {
    echo '<pre>';
    die(var_dump($val));
    echo '<pre>';
}
$password_length = 8;

function password_strength($password) {
	$returnVal = True;
	if ( strlen($password) < $password_length ) {
		$returnVal = False;
	}
	if ( !preg_match("#[0-9]+#", $password) ) {
		$returnVal = False;
	}
	if ( !preg_match("#[a-z]+#", $password) ) {
		$returnVal = False;
	}
	if ( !preg_match("#[A-Z]+#", $password) ) {
		$returnVal = False;
	}
	if ( !preg_match("/[\'^£$%&*()}{@#~?><>,|=_+!-]/", $password) ) {
		$returnVal = False;
	}
	return $returnVal;
}

 function from_camel_case($str) {
    $str[0] = strtolower($str[0]);
    $func = create_function('$c', 'return "_" . strtolower($c[1]);');
    return preg_replace_callback('/([A-Z])/', $func, $str);
  }


/*
<ul>
              
        </ul>
 * 
 * 
    
 */