<?php

$pighalth	=	5;
$maxThrows	=	8;
$game		=	array();

function calculatehit( )
{
	global $pighalth;
	$throw 	=	array();
	$kans	=	rand(1,5);
	$raak	=	($kans <=2) ? true : false;
	if ($raak){
		--$pighalth;
		echo 'Hit! ' . $pighalth . ' pigs left.' . '<br>';
	}
	else
	{
		echo 'Miss, ' . $pighalth . ' pigs left.' . '<br>';
	}
	return $throw;

}

function launchAngryBird( )
{
	global $pighalth;
	global $maxThrows;
	if ( $pighalth != 0 && $maxThrows > 0 )
	{
		$raak	=	calculatehit();
		$game[]	=	$raak;
		--$maxThrows;
		launchAngryBird();
	}
	else
	{
		if ($pighalth > 0)
		{
			echo '<br>' . 'Game over.';
		}
		else
		{
			echo '<br>' . 'Congratulations! you won the game.';
		}
	}	
}


launchAngryBird();





?>