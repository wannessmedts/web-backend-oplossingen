<?php

$message		=	false;
$errorMessage	=	false;

try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

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


			if(isset($_POST['edit']))
			{

				$editQuery	=	'SELECT *
								 FROM brouwers
								 WHERE brouwernr LIKE :brouwernr';

				$editStatement = $db->prepare( $editQuery );

				$editStatement->bindValue( ":brouwernr", $_POST['edit'] );

				$edit 	=	$editStatement->execute();

					$editFetchedResult 	=	array(); 

					while ( $editRow = $editStatement->fetch(PDO::FETCH_ASSOC) )
					{
						$editFetchedResult[] = $editRow;  
					}

				$message		=	'Wijzig waar gewenst en druk op wijzigen.';

			}

			if (isset($_POST['edit-confirm'])) 
			{

				$updateQuery	=	'UPDATE brouwers
												SET 	brnaam 		=	:brnaam,
														adres		=	:adres,
														postcode	=	:postcode,
														gemeente	=	:gemeente,
														omzet		=	:omzet
												WHERE 	brouwernr	= 	:brouwernr
												LIMIT 	1';

				$updateStatement = $db->prepare( $updateQuery );
				
				$updateStatement->bindValue( ":brouwernr",  $_POST[ 'brouwernr' ] );						
				$updateStatement->bindValue( ":brnaam",  	$_POST[ 'brnaam' ] );						
				$updateStatement->bindValue( ":adres",  	$_POST[ 'adres' ] );						
				$updateStatement->bindValue( ":postcode",  	$_POST[ 'postcode' ] );						
				$updateStatement->bindValue( ":gemeente", 	$_POST[ 'gemeente' ] );						
				$updateStatement->bindValue( ":omzet",  	$_POST[ 'omzet' ] );

				$updateSuccessful	=	$updateStatement->execute();

				if($updateSuccessful)
				{
					$message			=	'Aanpassing succesvol doorgevoerd.';
				}
				else
				{
					$message		=	"Aanpassing is niet gelukt. Probeer opnieuw of neem contact op met de systeembeheerder wanneer deze fout blijft aanhouden.";
				}

			}

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

            .message
            {
            	background-color: #07D626;
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

	<h1>Brouwerij database</h1>

	<p class="message">
		<?php if($message)
		{
		echo $message;
		}
		?>
	</p>

	<p>
		<?php if($errorMessage)
		{
		echo $errorMessage;
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

				<th>wijzigen</th>
				<?php if(isset($_POST['edit'])): ?>

				<form>

						<?php foreach ($editFetchedResult as $editBrouwer): ?>
							
						<ul>
							<li>
								<label for="brnaam">Brouwernaam</label>
								<input type="text" name="brnaam" id="brnaam" value="<?= $editBrouwer['brnaam'] ?>">
							</li>
							<li>
								<label for="adres">Adres</label>
								<input type="text" name="adres" id="adres" value="<?= $editBrouwer['adres'] ?>">
							</li>
							<li>
								<label for="postcode">Postcode</label>
								<input type="text" name="postcode" id="postcode" value="<?= $editBrouwer['postcode'] ?>">
							</li>
							<li>
								<label for="gemeente">Gemeente</label>
								<input type="text" name="gemeente" id="gemeente" value="<?= $editBrouwer['gemeente'] ?>">
							</li>
							<li>
								<label for="omzet">Omzet</label>
								<input type="text" name="omzet" id="omzet" value="<?= $editBrouwer['omzet'] ?>">
							</li>
							<li>
								<input type="hidden" name="brouwernr" id="brouwernr" value="<?= $editBrouwer['brouwernr'] ?>">
							</li>		
						</ul>
						<input type="submit" value="wijzigen" name="edit-confirm">

					<?php endforeach ?>
				</form>

				<?php endif ?>

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
					<td><button type="submit" value="<?= $brouwer['brouwernr']?>" name="edit"><img src="icon-edit.png" alt="Edit button"></button></td>
				</tr>
			<?php endforeach ?>

		</tbody>

	</table>
</form>
</body>
</html>