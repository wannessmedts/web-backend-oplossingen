<?php

	$nummers	=	array (1, 2, 3, 4, 5);

	function tellen($nummer)
	{
		echo 'Het getal dat je vraagt is ' . $nummer . '. ' . 'Graag gedaan!' . '<br>';
	}

	foreach ($nummers as $num) 
	{
		tellen($num);
	}

?>