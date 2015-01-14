<?php

include 'percent.php';

$test	=	new Percent( 150, 100);

var_dump($test);

?>

<!DOCTYPE html>
<html>
<head>
<title>opdracht include/require</title>
<meta charset="utf-8">
<style>
	td {
		border: 1px 
		solid lightgrey;
		padding: 12px;
		}
</style>
</head>
<body>

 <table>
     <caption>Hoeveel procent is 150 van 100?</caption>
     <thead></thead>
     <tfoot></tfoot>
     <tbody>
         <tr>
             <td>Absoluut</td>
             <td><?= $test->absolute ?></td>
         </tr>
         <tr>
             <td>Relatief</td>
             <td><?= $test->relative ?></td>
         </tr>
         <tr>
             <td>Geheel getal</td>
             <td><?= $test->hundred ?></td>
         </tr>
         <tr>
             <td>Nominaal</td>
             <td><?= $test->nominal ?></td>
         </tr>
     </tbody>
 </table>

</body>