<?php 

$message		=	false;

try
	{
		$db = new PDO('mysql:host=localhost;dbname=bieren', 'root', 'root');

		$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 FROM bieren
					 INNER JOIN brouwers	
					 		ON bieren.brouwernr	= brouwers.brouwernr
					 INNER JOIN soorten
					 		ON bieren.soortnr = soorten.soortnr
					 ORDER BY biernr ASC
					 ';

		$naamOrder	=	'desc';
		$naam = 'biernr';

		if (isset($_GET['order_by']))
		{

			switch ($_GET['order_by']) {
			case 'biernr-desc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr DESC';
				$naamOrder	=	'asc';
				break;

			case 'biernr-asc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr ASC';
				$naamOrder	=	'desc';
				break;
			
			case 'naam-desc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr DESC';
			 	$naamOrder	=	'asc';
				break;

			case 'naam-asc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr ASC';
			 	$naamOrder	=	'desc';
				break;

			case 'brouwernr-desc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr DESC';
			 	$naamOrder	=	'asc';
				break;

			case 'brouwernr-asc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr ASC';
			 	$naamOrder	=	'desc';
				break;

			case 'soortnr-desc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr DESC';
			 	$naamOrder	=	'asc';
				break;

			case 'soortnr-asc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr ASC';
			 	$naamOrder	=	'desc';
				break;

			case 'alcohol-desc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr DESC';
				$naamOrder	=	'asc';
				break;

			case 'alcohol-asc':
				$query	=	'SELECT bieren.biernr,
							bieren.naam,
							brouwers.brnaam,
							soorten.soort,
							bieren.alcohol 
					 		FROM bieren
					 		INNER JOIN brouwers	
					 			ON bieren.brouwernr	= brouwers.brouwernr
					 		INNER JOIN soorten
					 			ON bieren.soortnr = soorten.soortnr
							ORDER BY biernr ASC';
				$naamOrder	=	'desc';
				break;

			default:
				$query	=	'SELECT * 
							 FROM bieren
							 ORDER BY biernr ASC';
				break;

			}

		}

		$statement = $db->prepare( $query );

		$statement->execute();

		$fetchedResult 	=	array(); 

		while ( $row = $statement->fetch(PDO::FETCH_ASSOC) )
		{
			$fetchedResult[] = $row;  
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
	 	<title>Order By</title>

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

			button
			{
				background-color	:	transparent;
				border				:	none;
				padding				:	0px;
				cursor				:	pointer;
			}

			.order a
			{
			    padding-right:20px;
			    background-repeat:no-repeat;
			    background-position:right;
			}

			a:active, a:visited, a:link
			{
				color: black;
			}

		</style>

	</head>

	<body>

		<h1>Order By</h1>

			<p class="message">
			<?php if($message)
			{
			echo $message;
			}
			?>
			</p>

<table class="myTable">
		
		<thead>

			<tr>

				<th class="order"><a href="opdracht_CRUD_Order_By.php?order_by=biernr-<?= $naamOrder?>">Biernummer (PK)<img src="<?= (isset($_GET['order_by']) && $_GET['order_by']=='biernr-asc')? 'icon-asc.png' : 'icon-desc.png' ?>"></a></th>
				<th class="order"><a href="opdracht_CRUD_Order_By.php?order_by=naam-<?= $naamOrder?>">Bier<img src="<?= (isset($_GET['order_by']) && $_GET['order_by']=='naam-asc')? 'icon-asc.png' : 'icon-desc.png' ?>"></a></th>
				<th class="order"><a href="opdracht_CRUD_Order_By.php?order_by=brouwernr-<?= $naamOrder?>">Brouwer<img src="<?= (isset($_GET['order_by']) && $_GET['order_by']=='brouwernr-asc')? 'icon-asc.png' : 'icon-desc.png' ?>"></a></th>
				<th class="order"><a href="opdracht_CRUD_Order_By.php?order_by=soortnr-<?= $naamOrder?>">Soort<img src="<?= (isset($_GET['order_by']) && $_GET['order_by']=='soortnr-asc')? 'icon-asc.png' : 'icon-desc.png' ?>"></a></th>
				<th class="order"><a href="opdracht_CRUD_Order_By.php?order_by=alcohol-<?= $naamOrder?>">Alcoholpercentage<img src="<?= (isset($_GET['order_by']) && $_GET['order_by']=='alcohol-asc')? 'icon-asc.png' : 'icon-desc.png' ?>"></a></th>

			</tr>

		</thead>

		<tbody>
				
			<tr>

			<?php foreach ($fetchedResult as $key => $brouwer): ?>
				<tr>
					<?php foreach ($brouwer as $value): ?>
						<td><?= $value ?></td>
					<?php endforeach ?>
				</tr>
			<?php endforeach ?>

		</tbody>

	</table>
	</body>
</html>