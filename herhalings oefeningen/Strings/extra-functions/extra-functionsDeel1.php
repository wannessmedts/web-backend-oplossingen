<?php

$fruit		=	'kokosnoot';
$karakters	=	strlen($fruit);
$voorkomen	=	'o';
$pos		=	strpos($fruit, $voorkomen);


?>

<!DOCTYPE html>
<html>
<head>
<title>extra functions deel 1</title>
</head>

<body>
<p>
	<?= $karakters ?>
</p>
<p>
	<?= $pos ?>
</p>
</body>

</html>