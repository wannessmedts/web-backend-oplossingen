<?php 
require_once 'app/init.php';

if(isset($_POST['naam']))
{
	$naam	=	trim($_POST['naam']);

	if(!empty($naam))
	{
		$addedQuery	=	$db->prepare('INSERT INTO items (naam, user, done)
										VALUES (:naam, :user, 0)
									');
		$addedQuery->execute([
			'naam' => $naam,
			'user' => $_SESSION['user_id']
			]);
	}
}

header('location: todo.php');

 ?>