<?php

$getallen	=	array( 1, 2, 3, 4, 5 );

$product	=	array_product ( $getallen );

$getallenReverse     =  array_reverse( $getallen );


foreach ($getallen as $key => $value)


		echo $value + $getallenReverse[ $key ];



var_dump( $product );


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
		<?= $product ?>
	</p>



		<ul>
			<?php foreach ($getallen as $value):

				if($value % 2 != 0)

				echo $value;
				
				?>

			<?php endforeach ?>

		</ul>
		
		
</body>
</html>