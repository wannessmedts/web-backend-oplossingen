<?php

$x	=	1;
$y	=	2;


function sum($x, $y) {
    $z = $x + $y;
    return $z;
}

function times ($x, $y)
{
	$w	=	$x * $y;
	return $w;	
}

function isEven ($x)
{
	$par	=	"even";
	if ($x % 2 > 0){
		$par	=	"oneven";
	}
	return $par;
}


echo "$x + $y = " . sum($x, $y) . '<br>';

echo "$x * $y = " . times($x, $y) . '<br>';

echo isEven($x);

?>