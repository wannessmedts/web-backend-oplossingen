<?php

$lettertje		=	'e';
$cijfertje		=	3;
$langsteWoord	=	'zandzeepsodemineralenwatersteenstralen';
$vervangen		=	str_replace($lettertje, $cijfertje, $langsteWoord);

?>
<!DOCTYPE html>
<html>
<head>
<title>extra functions deel 3</title>
</head>

<body>
<p>
	<?= $vervangen ?>
</p>


</body>

</html>