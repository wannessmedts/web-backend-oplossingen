<?php

$md5HashKey	=	'd1fa402db91a7a93c4f414b8278ce073';
$x	=	'2';
$y	=	'8';
$z	=	'a';



function functie1 ($haystack, $needle)
{
	$hayAant	=	strlen($haystack);
	$neeAant	=	substr_count($haystack, $needle);
	$procent	=	($neeAant / $hayAant) * 100;
	return $procent;
}

function functie2 ($haystack, $needle)
{
	$hayAant	=	strlen($haystack);
	$neeAant	=	substr_count($haystack, $needle);
	$procent	=	($neeAant / $hayAant) * 100;
	return $procent;
}

function functie3 ($haystack, $needle)
{
	$hayAant	=	strlen($haystack);
	$neeAant	=	substr_count($haystack, $needle);
	$procent	=	($neeAant / $hayAant) * 100;
	return $procent;
}

echo functie1 ($md5HashKey, $x) . '<br>';
echo functie2 ($md5HashKey, $y) . '<br>';
echo functie3 ($md5HashKey, $z) . '<br>';

?>