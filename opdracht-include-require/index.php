<?php

$artikels	=	array( 
						array('titel' => 'PHP 8.4 gereleased', 
							  'text' => 'De nieuwste versie van PHP bevat uitbreidingen op oa. mind control-facades, in-browser 3d projecties en de API voor drones.', 
							  'tags' => 'Kernwoorden: new, PHP 8.4',
							  ),

						array('titel' => 'Zymphovel framework', 
							  'text' => 'Wordt Zymphovel het nieuwste PHP-framework dat de wereld in een sneltempo zal veroveren?', 
							  'tags' => 'Kernwoorden: frameworks',
							  ),

						array('titel' => 'Rasmus Lerdorf vermist', 
							  'text' => 'De geestelijke vader van PHP Rasmus Lerdorf is sinds vorige week vermist nadat hij met zijn privé-jet richting Ibiza vertrok.', 
							  'tags' => 'Kernwoorden: bizar, rasmus lerdorf, feestneus',
							  ),


						);


include 'view/header-partial.html';

include	'view/body-partial.html';

echo '<h1>Nieuws</h1>'; 

foreach ($artikels as $key => $value) {
	echo '<article class="overk"> <h2>' . $value [ 'titel' ]  . '</h2>';
	echo '<p>' . $value [ 'text' ] . '</p>';
	echo '<p>' . $value [ 'tags'] . '</p> </article>';
}



include	'view/footer-partial.html';

?>