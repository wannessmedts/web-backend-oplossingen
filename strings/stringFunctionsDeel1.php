<!doctype html>

<?php

$fruit         	 	=       "kokosnoot";

$needle				=		"o";

$lengte				=		strlen ($fruit);

$needlePosition					=		strpos ($fruit, $needle);

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

      <p> <?php echo $lengte;?></p>

      <p> <?php echo $needlePosition;?> </p>
    </body>
</html>