<?php

$num	=	array(8, 7, 8, 7, 3, 2, 1, 2, 4);
$sort	=	rsort($num);

var_dump($sort);

$scan	=	array_unique($sort);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>opdracht array functies: deel 3</title>
</head>
<body>

<p>
<?php 

print_r($scan);

?>
</p>



</body>
</html>