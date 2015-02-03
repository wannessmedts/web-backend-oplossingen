<?php

$messageContainer	=	'';

try
{
	$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

    $nummer =   1;

	$query	=   'SELECT brnaam, brouwernr
			     FROM brouwers';


	$statement = $db->prepare( $query );

    $statement->execute();

    $fetchedResult  =   array(); 

        while ( $row = $statement->fetch() )
        {
            $fetchedResult[] = $row;  
        }

    $brouwerNr  =   1;

    if (isset($_GET['brouwerNr']))
    {
        $brouwerNr  = $_GET['brouwerNr'];
    }

        $bierenQueryString = 'SELECT naam 
                        FROM bieren
                        WHERE brouwernr = :brouwernr';

    $bierenStatement    =   $db->prepare( $bierenQueryString);

    $bierenStatement->bindValue(':brouwernr', $brouwerNr);

    $bierenStatement->execute();

    $bieren = array();

            while ( $row = $bierenStatement->fetch() )
        {
            $bieren[] = $row;  
        }

    $bierenKolomnamen =   array_keys( $bieren[0] );

}
    catch ( PDOException $e )
    {
        $messageContainer   =   'Er ging iets mis: ' . $e->getMessage();
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

		<h2>Overzicht van de bieren van de brouwers</h2>

        <form>
            <label for="brouwers">Select Brouwers</label>
            <select name="brouwersId" id="brouwers"> 
                <?php foreach ($fetchedResult as $brouwer) :?>
                    <option value="<?= $brouwer ['brouwernr'] ?>"><?= $brouwer ['brnaam']?></option>
                <?php endforeach ?>
            </select>

            <input type="submit" value="zoek">

    <table>
        
        

        <thead>
            <tr>
                <th>#</th>
                <?php foreach ($bierenKolomnamen as $bierenKolomNaam): ?>
                    <th><?= $bierenKolomNaam ?></th>
                <?php endforeach ?>
            </tr>
        </thead>

        <tbody>
        
            <?php foreach ($bieren as $nummer => $bier): ?>
                <tr class="<?= ( ( $nummer + 1) %2 == 0 ) ? 'even' : '' ?>">
                    <td><?= ( $nummer + 1 ) ?></td>
                    <td><?= $bieren ?></td>
                </tr>
            <?php endforeach ?>

        </tbody>

    </table>


</body>
</html>