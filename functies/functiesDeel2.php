<?php

$x	=	array('enkele','waarden','die','je','zelf','mag','kiezen');

$string	=	'<html>
			 <head>
			 </head>
			 <body>
			 </body>
			 </html>';

echo '$x[0] heeft als waarde ' . $x[0] . '<br>';

function validateHtmlTag($html)
{ 
  $start =strpos($html, '<');
  $end  =strrpos($html, '>',$start);
  $par	='inorde';
  if ($end !== false) {
    $html = substr($html, $start);
  } else {
  	$par	=	'error';
    $html = substr($html, $start, $start);
  }
  libxml_use_internal_errors(true);
  libxml_clear_errors();
  $xml = simplexml_load_string($html);
  return count(libxml_get_errors())==0;
}

function validater()
 {
  $par	=	'valid';
  if (validateHtmlTag())
  {
  	echo 'invalid';
  }
 }

var_dump(validateHtmlTag());

echo validater($string);



?>