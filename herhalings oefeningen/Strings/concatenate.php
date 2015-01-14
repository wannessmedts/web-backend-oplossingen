<?php

$naam			=	'Wannes';
$achternaam		=	'Smedts';
$volledigeNaam	=	$naam . ' ' . $achternaam;

/*

Wannes Smedts
Wannes.smedts@hotmail.be

*/


?>

<!DOCTYPE html>
<html>
<head>
<title>concatenat in php</title>
</head>

<body>

	<p>
		Hallo, mijn naam is <?= $volledigeNaam ?>.
	</p>

</body>

</html>