<?php

$nummers	=	array();
$num2	=	100;

$num	=	0;

while ($num < $num2)
{
	$nummers[] =	$num;
	++$num;
}

$reeks	=	implode( ',', $nummers);

//------------------------------------------------

$getal	=	0;

$getallen	=	array();

while ($getal < $num2)
{
	if ($getal % 3 == 0 && $getal > 40 && $getal < 80)
	{
		$getallen[]	=	$getal;
	}

	++$getal;
}

$reeks2	=	implode(',', $getallen)





?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>while loop</title>
</head>
<body>

<p>
<?= $reeks
?>
</p>

<p><?= $reeks2?></p>


</body>
</html>