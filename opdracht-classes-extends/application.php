<?php

function autoloader( $className )
{
	include_once( $className . '.php');
}

spl_autoload_register( 'autoloader' );

$tom	=	new Animal( 'tom', 'male', 100 );
$jerry	=	new Animal( 'jerry', 'male', 80 );
$tweety	=	new Animal( 'tweety', 'female', 100 );

$simba	=	new lion( 'Simba', 'male', 80, 'Congo lion');
$scar	=	new lion( 'Scar', 'male', 100, 'Kenia lion');

var_dump($tom->getName());
var_dump($tom->getHealth());
var_dump($tom->getGender());
var_dump($jerry);
var_dump($tweety);
var_dump($simba);
var_dump($scar);

?>