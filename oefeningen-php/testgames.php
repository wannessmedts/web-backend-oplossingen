<?php

$sides		=	6;
$voorN		=	array("William","Henry","Filbert","John", "Pat",);
$achterN	=	array("Smith","Jones","Winkler","Cooper","Cline",);
$i			=	1;




function roll($x)
{
	return mt_rand(1,$x);
}

echo roll($sides);


echo '<br>';
echo '<br>';
echo '<br>';

function naam($y)
{
	global $i;	
	global $voorN;
	global $achterN;
	while ($i)
	{
	$c = array();
	$a = array_rand($voorN, $i);
	$b = array_rand($achterN, $i);
	echo $a . ' ' . $b . '<br>';
	return $c;
	}
}

naam($i)



?>