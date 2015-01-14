<?php

$artikels	=	array( array('title' => 'Daar is de eerste sneeuw',
					  'datum' => '3 december 2014',
					  'inhoud' => 'Een dag nadat de weerkundige winter van start ging, dwarrelden gisteravond de eerste sneeuwvlokjes naar beneden in Vlaanderen. Ook aan de andere kant van het land zag het hier en daar mooi wit met plaatselijk een laagje van 2 tot 4 cm. Van een perfecte timing gesproken.',
					  'afbeelding' => 'sneeuw.jpg',
					  'afbeeldingbeschrijving' => 'auto onder sneeuw', ),

					array('title' => '"Mevrouw, vanaf nu loopt een wandelpad
						  door uw huis"',
					  'datum' => '3 december 2014',
					  'inhoud' => 'Een verdwenen wandelweggetje in Aarschot dat al eeuwen door niemand gemist wordt, moet in ere hersteld worden. Dat heeft de rechter beslist. Eén probleem: op de plek waar de boeren in de jaren 1800 naar hun velden baggerden, staat nu al dertig jaar een huis. "Mevrouw, vanaf nu loopt er een wandelweg door uw woning."',
					   'afbeelding' => 'aarschot.jpg',
					   'afbeeldingbeschrijving' =>'huis in aarschot',
					   ),

					array('title' => 'Rusland oefent opnieuw met \'oorlogsdolfijnen\'',
					  'datum' => '3 december 2014',
					  'inhoud' => 'Met de Russische annexatie van de Krim is een bijzondere maritieme eenheid weer in handen van Rusland gekomen: de oorlogsdolfijnenbrigade. Voor het eerst sinds de overname van het Oekraïense schiereiland heeft de Russische marine met de dieren geoefend, meldt staatspersbureau Spoetnik.',
					  'afbeelding' => 'dolfijn.jpg', 
					  'afbeeldingbeschrijving' => 'dolfijn',),

					   );


//var_dump( $_GET );

$artikel	=	false;
$ongeldig	=	false;

if(isset($_GET ['id']))

	if ( array_key_exists( $key = $_GET ['id'], $artikels ))
	{
		$artikels	=	array( $artikels[ $key ] );
		$artikel	=	true;
	}
	else
	{
	$ongeldig	=	true;
	}



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>

body
		{
			font-family:"Segoe UI";
		}

article{
			float: left;
			width:288px;
			margin:16px;
			padding:16px;
			background-color:#EEEEEE;
		}

.foto	{
	width: 256px;
}

</style>


	<?php if(!$artikel and !$ongeldig): ?>
		<title>Opdracht get</title>
	<?php elseif($ongeldig): ?>
		<title>Artikel bestaat niet</title>
	<?php else: ?>
		<title>Artikel: <?php echo $artikels [$_GET ['id']][ 'title' ]?></title>
	<?php endif ?>


</head>

<body>
	<h1>De krant van vandaag</h1>

	<p><?php //echo var_dump($artikels) ?></p>

		<?php if (!$ongeldig): ?>
			<div class="artikel">
  				<?php foreach ($artikels as $key => $value): ?>
						<article class="overk">
							<h2> <?= $value [ 'title' ] ?> </h2>
							<p> <?= $value [ 'datum' ] ?> </p>
							<img class="foto" src="img/<?= $value [ 'afbeelding' ] ?>" alt="<?= $value [ 'afbeeldingbeschrijving' ] ?>">
							<p> <?php echo( !$artikel )? substr ( $value [ 'inhoud' ], 0, 50) . '...' : str_replace( "\r\n", '</p><p>', $value ['inhoud'] ) ?> </p>
							<?php if (!$artikel): ?>
							<a href="opdracht-get.php?id=<?php echo $key ?>">Lees meer</a>
							<?php endif ?>
				 	</article>
  				<?php endforeach ?>
  			</div>	
  		<?php else: ?>
  				<p> Het artikel bestaat niet. </p>
  		<?php endif ?>
 

</body>

</html>