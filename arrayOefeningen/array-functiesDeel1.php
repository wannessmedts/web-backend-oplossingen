<?php

$dieren	=	array('ezel', 'koe', 'paard', 'schaap', 'varken', 'kip');

$teZoekenDier	=	'vogel';

	if( in_array( $teZoekenDier, $dieren ) )
	{
			$resultaat = $teZoekenDier . ', Het dier  is aanwezig.';
	}
	else
	{
			$resultaat = $teZoekenDier . ', Het dier is niet aanwezig.';
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>

<body>

	<p>
		Er zijn <?= ( count( $dieren )) ?> dieren aanwezig.
	</p>

	<p>
		<?= $resultaat ?>
	</p>

</body>
</html>