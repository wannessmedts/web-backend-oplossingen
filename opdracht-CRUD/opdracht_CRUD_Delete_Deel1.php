<?php

$message	=	false;

try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		$query	=	'SELECT * 
					 FROM brouwers';

		$statement = $db->prepare( $query );

		$statement->execute();

		$fetchedResult 	=	array(); 

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchedResult[] = $row;  
		}

		$columnNames	=	array();

		foreach( $fetchedResult[0] as $key => $brouwer )
		{
			$columnNames[  ]	=	$key;
		}

if(isset($_POST['delete']))
{
	$deleteQuery	=	'DELETE FROM brouwers
								WHERE brouwernr = :brouwernr
								LIMIT 1';

	$deleteStatement	=	$db->prepare( $deleteQuery );

	$deleteStatement->bindParam( ':brouwernr', $_POST['delete'] );

	$verwijderd		=	$deleteStatement->execute();

	if($verwijderd)
	{
		$message	=	'Brouwer is verwijderd!';
	}
	else
	{
		$message	=	'Het verwijderen is mislukt!';
	}
}

//var_dump($fetchedResult);


		/*$kollomnamen	=	array();

		foreach( $fetchedResult[0] as $key => $brouwers )
		{
			$kollomnamen[]	=	$key;
		}*/

	}
    catch ( PDOException $e )
	{
		$message['type']	=	'error';
		$message['text']	=	'De connectie is niet gelukt.';
	}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing oefening CRUD delete</title>
		<style>
 			table
            {
                font-size:12px;
                overflow:auto;
            }

            table th,
            table td
            {
                padding:4px;
            }

            table th
            {
                text-align:center;
            }

            thead
            {
            	background-color: #808080;
            }

            .myTable tr:nth-child(odd)		
            { 
            	background-color:#F1F1F1; 
            }

			.myTable tr:nth-child(even)		
			{
				background-color:#fff; 
			}
		</style>
	</head>
<body>

	<h1>Brouwerij verwijderen</h1>

	<p>
		<?php if($message == true)
		{
		echo $message;
		}
		?>
	</p>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">

	<table class="myTable">
		
		<thead>

			<tr>

				<th>#</th>

				<?php foreach ($columnNames as $columnName): ?>
					<th><?= $columnName ?></th>
				<?php endforeach ?>

				<th>delete</th>

			</tr>

		</thead>

		<tbody>
				
			<tr>

			<?php foreach ($fetchedResult as $key => $brouwer): ?>
				<tr>
					<td><?= ($key + 1) ?></td>
					<?php foreach ($brouwer as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
					<td><button type="submit" value="<?= $brouwer['brouwernr']?>" name="delete"><img src="icon-delete.png"></button></td>
				</tr>
			<?php endforeach ?>

		</tbody>

	</table>
</form>
</body>
</html>