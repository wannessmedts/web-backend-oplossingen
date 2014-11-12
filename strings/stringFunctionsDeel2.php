<!doctype html>

<?php

$fruit         	 	=       "ananas";

$needle				=		"a";

$pos				=		strrpos ($fruit, $needle);

$str 				=		strtoupper($fruit);

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
      <h1> <?=$fruit?> </h1>

      <p> <?php echo $pos;?> </p>

      <p> <?php echo $str;?> </p>

    </body>
</html>