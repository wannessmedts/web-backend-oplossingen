<?php

$message	= false;

if (isset($_POST['submit']))
{

	try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');
		
		$query	=	'INSERT INTO brouwers 
								(brnaam,
								 adres, 
								 postcode, 
								 gemeente, 
								 omzet)
					 		VALUES (:brnaam,
								 :adres,
								 :postcode,
								 :gemeente,
								 :omzet)';

		$statement = $db->prepare( $query );

		$statement->bindValue(':brnaam', $_POST['brnaam']);
		$statement->bindValue(':adres', $_POST['adres']);
		$statement->bindValue(':postcode', $_POST['postcode']);
		$statement->bindValue(':gemeente', $_POST['gemeente']);
		$statement->bindValue(':omzet', $_POST['omzet']);

		$submit = $statement->execute();

		var_dump($submit);

		if($submit)
		{
			$message = 'Brouwerij succesvol toegevoegd.';
		}
		else 
		{
			$message = 'Er ging iets mis met het toevoegen. Probeer opnieuw.';			
		}				



	}
    catch ( PDOException $e )
    {
        $message   =  'Er ging iets mis';
    }

}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Oplossing oefening CRUD insurt</title>
	</head>
<body>

	<h1>Brouwerij toevoegen</h1>

	<p>
		<?php if($message == true)
		{
		echo $message;
		}
		?>
	</p>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<ul>
			<li>
				<label for="brnaam">Brouwernaam</label>
				<input type="text" name="brnaam" id="brnaam">
			</li>
			<li>
				<label for="adres">Adres</label>
				<input type="text" name="adres" id="adres">
			</li>
			<li>
				<label for="postcode">Postcode</label>
				<input type="text" name="postcode" id="postcode">
			</li>
			<li>
				<label for="gemeente">Gemeente</label>
				<input type="text" name="gemeente" id="gemeente">
			</li>
			<li>
				<label for="omzet">Omzet</label>
				<input type="text" name="omzet" id="omzet">
			</li>
		</ul>
		<input type="submit" value="submit" name="submit">
	</form>

</body>
</html>