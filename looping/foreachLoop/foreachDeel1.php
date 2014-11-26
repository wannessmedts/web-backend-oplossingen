<?php

$text	=	"./text.txt";

$document	=	file_get_contents($text);

$lijn	=	explode("\n", $document);

?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>foreach: deel 1</title>
    </head>
    <body>

<p>
<?= $document ?>
</p>


    </body>
</html>