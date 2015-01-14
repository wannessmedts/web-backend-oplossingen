<?php

$i			=	100000;
$rente		=	8;
$n			=	10;

function rente($array)
{

	$jaar	=	1;

	$winst	=	$array['bedrag'] * ($array['rente'] / 100);

	$totaal	=	$array['bedrag'] + $winst;

	$uitkomst[] = 'na: ' . $array['jaar'] . ' jaar, totaal: ' . floor($totaal) . ' winst: ' . floor($winst);

	if ($array['jaar'] != $array['jaren'] )
	{

		++$array['jaar'];

		rente($array);

	}

	return $uitkomst;

}



$testArray	=	array('bedrag' => 100000,
					  'jaren' => 10, 
					  'rente' => 8, 
					  'jaar' => 1, 
					  'uitkomst' => array());

$groei		=	1.08;


$opbrengst	=	rente(array('bedrag' => 100000,
					  		'jaren' => 10, 
					  		'rente' => 8, 
					  		'jaar' => 1, 
					  		'uitkomst' => array())
					  		);


foreach($opbrengst['uitkomst'] as $value)
{
	echo $value . '<br>';
}

echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

echo 'dit moet ik berijken ' . $i * pow($groei,$n);










?>