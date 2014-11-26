<?php

$dieren = array("beer", "beer", "tijger", "kat", "wolf", "vos", "leeuw", "meeuw", "krokodil", "giraff");

var_dump( $dieren );

$dieren1[]	=	"beer";
$dieren1[]	=	"beer";
$dieren1[]	=	"tijger";
$dieren1[]	=	"kat";
$dieren1[]	=	"wolf";
$dieren1[]	=	"vos";
$dieren1[]	=	"leeuw";
$dieren1[]	=	"meeuw";
$dieren1[]	=	"krokodil";
$dieren1[]	=	"giraff";

var_dump( $dieren1 );

$voertuigen = array('landvoertuig' => 'auto', 'bus', 'fiets', 'luchtvoertuig' => 'vliegtuig', 'raket', 'ufo', 'watervoertuig' => 'boot', 'onderzeeër' );

var_dump( $voertuigen );

$voertuigen1['landvoertuig'] = array('auto', 'bus', 'fiets');
$voertuigen1['luchtvoertuig'] = array('vliegtuig', 'raket', 'ufo');
$voertuigen1['watervoertuig'] = array('boot', 'onderzeeër');

var_dump( $voertuigen1 )

?>