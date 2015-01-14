<?php

$fruit			=	'ananas';
$letter			=	'a';
$pos			=	strrpos($fruit, $letter);
$hoodletters	=	strtoupper($fruit);

?>

<!DOCTYPE html>
<html>
<head>
<title>extra functions deel 2</title>
</head>

<body>
<p>
	<?= $pos ?>
</p>
<p>
	<?= $hoodletters ?>
</p>

</body>

</html>