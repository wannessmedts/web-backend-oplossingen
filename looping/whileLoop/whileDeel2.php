
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>while: deel2</title>
		<style> 
.odd
{
	background-color: lightgreen;
}


		</style>
    </head>
    <body>

    	<table>

			<?php 
				$tafel 		= 	0;
			?>
			<?php while( $tafel < 10 ):  ?>
				
				<tr>
					<?php 
						$product = 	1;
					?>
					<?php while( $product <= 10 ):  ?>

						<td class="<?= ( ( $tafel * $product ) % 2 > 0 ) ? '' : 'odd' ?>"><?= $tafel * $product ?></td>
						<?php ++$product ?>
					<?php endwhile ?>
				</tr>

				<?php ++$tafel ?>
			<?php endwhile ?>

		</table>


    </body>
</html>