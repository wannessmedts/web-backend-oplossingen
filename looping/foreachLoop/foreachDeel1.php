<?php

$text	=	"./text.txt";

$document	=	file_get_contents($text);

$karakters	=	str_split($document);

$gesorteert	=	$karakters;

rsort($gesorteert);

$omgedraait	=	array_reverse($gesorteert);

$karakterarray	=	array();

foreach( $omgedraait as $karakter )
{
	if( !isset($karakterarray[$karakter]))
	{
		$karakterarray [$karakter]	=	1;
	}
	else
	{
		++$karakterarray [$karakter];
	}
}

var_dump($karakterarray);


$tekstkarakters	= count_chars($document, 1);

var_dump($tekstkarakters);



?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>foreach: deel 1</title>
    </head>
    <body>
 


    </body>
</html>