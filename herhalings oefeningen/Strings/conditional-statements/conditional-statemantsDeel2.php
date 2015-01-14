<?php

$getal		=	1;
$letter 	=	'a';
$needle		=	'A';

if ($getal == 1) {
	$dag				=	'Maandag';
	$hoofdletter		=	strtoupper($dag);
}
elseif ($getal == 2) {
	$dag				=	'Dinsdag';
	$hoofdletter		=	strtoupper($dag);
}
elseif ($getal == 3) {
	$dag				=	'Woensdag';
	$hoofdletter		=	strtoupper($dag);
}
elseif ($getal == 4) {
	$dag				=	'Donderdag';
	$hoofdletter		=	strtoupper($dag);
}
elseif ($getal == 5) {
	$dag				=	'Vrijdag';
	$hoofdletter		=	strtoupper($dag);
}
elseif ($getal == 6) {
	$dag				=	'zaterdag';
	$hoofdletter		=	strtoupper($dag);
}
elseif ($getal == 7) {
	$dag				=	'zondag';
	$hoofdletter		= strtoupper($dag);
}

$vervangen	=	str_replace($needle, $letter, $hoofdletter);
$laatste	=	



?>
<!DOCTYPE html>
<html>
<head>
<title>conditional statemants deel 2</title>
</head>

<body>
<p>
	<?= $hoofdletter ?>
</p>
<p>
	<?= $vervangen ?>
</p>

</body>

</html>