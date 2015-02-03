<?php

$massagecontainer	=	'';

try
{
	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

	$db->query('bieren');

	$messageContainer 	=	'Database bieren succesvol aangemaakt';

	$q	=	'SELECT *
			 FROM bieren
			 INNER JOIN brouwers
			 	ON bieren.brouwernr  = brouwers.brouwernr
			 WHERE bieren.naam LIKE "du%"
			 AND brouwers.brnaam LIKE "%a%"';

	$statement = $db->prepare($q);

	$statement->execute();

		$fetchedResult 	=	array(); 

		while ( $row = $statement->fetch() )
		{
			$fetchedResult[] = $row;  
		}

//var_dump($fetchedResult);

}
catch ( PDOException $e )
{
	$messageContainer	=	'Er ging iets mis: ' . $e->getMessage();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Voorbeeld van database resultaten ophalen (PDO)</title>
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
            	background-color: 
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

<body class="web-backend-voorbeeld">

	<section class="body">	

		<p><?php echo $messageContainer ?></p>

		<h2>Overzicht van de bieren</h2>

<table class="myTable">
        
    <thead>
        <tr>
            <th>#</th>
            <th>biernr (PK)</th>
            <th>naam</th>
            <th>brouwernr</th>
            <th>soortnr</th>
            <th>alcohol</th>
            <th>brnaam</th>
            <th>adres</th>
            <th>postcode</th>
            <th>gemeente</th>
            <th>omzet</th>
        </tr>
    </thead>

    <tbody>

		<?php foreach ($fetchedResult as $rij): ?>

		<tr>
            <th></th>
			<th><?= $rij['biernr'] ?></th>
			<th><?= $rij['naam'] ?></th>
			<th><?= $rij['brouwernr'] ?></th>
			<th><?= $rij['soortnr'] ?></th>
			<th><?= $rij['alcohol'] ?></th>
			<th><?= $rij['brnaam'] ?></th>
			<th><?= $rij['adres'] ?></th>
			<th><?= $rij['postcode'] ?></th>
			<th><?= $rij['gemeente'] ?></th>
			<th><?= $rij['omzet'] ?></th>
		</tr>
				
		<?php endforeach ?>

	</tbody>

</table>

</body>
</html>