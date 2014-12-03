<?php

$maxtafels	=	10;
$maxproduct	=	10;




?>

<html>

<body>

<table>

	<?php for($rij = 0; $rij <= $maxtafels; ++$rij): ?>

  		<tr>

			<?php for($kolom = 0; $kolom <= $maxtafels; ++$kolom): ?>

				<td><?=$rij * $kolom ?></td>

			<?php endfor ?>
  		</tr>

  	<?php endfor ?>

</table>

</body>

</html>