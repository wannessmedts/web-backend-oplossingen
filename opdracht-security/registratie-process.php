<?php 

session_start();

$_SESSION['notification']	=	false;

try
	{
		$db = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
		
		$query	= 'SELECT email 
				   FROM test';

		$statement = $db->prepare( $query );

		$submit = $statement->execute();

	}
    catch ( PDOException $e )
    {
        $message   =  'De conectie met de database is mislukt.';
    }		

	if(isset($_SESSION['notification']))
	{
	    if (filter_var($_POST['e-mail'], FILTER_VALIDATE_EMAIL))
			{

				/*if()
				{

				}
				else
				{
				$_SESSION['notification']	=	'E-mail is toegevoegd.';
				}*/
				header('location: registratie-form.php');
			}
		else
			{
				$_SESSION['notification']	=	'E-mail is niet toegevoegd.';
				header('location: registratie-form.php');
			}
	}
	else
	{
		$_SESSION['notification'] = false;
	}
var_dump($_POST);

 ?>

