<!doctype html>

<?php

$lettertje         	=       "e";

$cijfertje			=		"3";

$langsteWoord		=		"zandzeepsodemineralenwatersteenstralen";

$rep				=		str_replace($lettertje, $cijfertje, $langsteWoord)

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="$1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>test php/html</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="author" href="humans.txt">
    </head>
    <body>
        <script src="js/main.js"></script>

        <h1><?php echo $rep?></h1>

    </body>
</html>