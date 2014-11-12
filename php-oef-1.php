<!doctype html>
<?php

$voorNaam           =       "Wannes";

$volleddigeNaam     =       $voorNaam . " " . "Smedts";

/*wannes smedts  
wannes.smedts@hotmail.be
*/

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

     <h1>howdy! <?= $voorNaam?> hier.</h1>

     <p>ik ben <?= $volleddigeNaam?>.</p>
        
    </body>
</html>