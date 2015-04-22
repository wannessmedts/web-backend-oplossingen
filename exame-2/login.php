<?php 

include 'app/init.php';

	if (isset($_POST['submit']))
	{
		$userQuery= 'SELECT *
							FROM user
							WHERE email = :email
							AND paswoord = :paswoord ';

		$statement = $db->prepare( $userQuery );

		$statement->bindValue( ':email', $_POST[ 'email' ] );
		$statement->bindValue( ':paswoord', $_POST[ 'paswoord' ] );

		$statement->execute();

		$results = array();

			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$results[]	=	$row;
				$_SESSION['user_id'] = $results[0]['id'];
				header( 'location: todo.php' );
			}
			if ( empty( $results ) )
			{
				header( 'location: form.php' );
			}
	}
	else
	{
		header( 'location: form.php' );
	}
?>