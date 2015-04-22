<?php

	include 'app/init.php';

	$_SESSION['message']	=	false;

	if (isset($_POST['Registreren']))
	{

		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$email 		= 	$_POST['email'];
			$paswoord 	=	$_POST['paswoord'];
			$controleQuery = 'SELECT email
								FROM user
								WHERE email = :email';

		$statement = $db->prepare( $controleQuery );

		$statement->bindValue( ':email', $_POST[ 'email' ] );
		
		$statement->execute();

		$results = array();

			while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
			{
				$results[]	=	$row;
				$_SESSION['message']	=	'Email bestaat al, kies een ander.';
				header( 'location: register-form.php' );
			}
			if ( empty( $results ) )
			{
				$insertQuery 	=	'INSERT INTO user
											(email,
        			    					paswoord)
  									 VALUES (:email,
  											 :paswoord)';

				$statement = $db->prepare( $insertQuery );
					
				$statement->bindValue( ':email', $_POST[ 'email' ] );
				$statement->bindValue( ':paswoord', $_POST[ 'paswoord' ] );

				$toegevoegd	=	$statement->execute();

				if ( $toegevoegd )
				{
					$_SESSION['message']	=	'Uw email adres is toegevoegd.';
					$results = array();

						while ( $row = $statement->fetch( PDO::FETCH_ASSOC ) )
						{
							$results[]	=	$row;
							$_SESSION['user_id'] = $results[0]['id'];
							header( 'location: todo.php' );
						}
					die(header( 'location: login.php' ));
				}
				else
				{
					$_SESSION['message']	=	'Er ging iets mis met het toevoegen, probeer opnieuw';
					header( 'location: register-form.php' );
				}
		
			}

			if ($_POST['paswoord'] == '')
			{
				$_SESSION['message'] = 'Opgelet, Paswoord mag niet leeg zijn!';
				header( 'location: register-form.php' );
			}
		}else
		{
			$_SESSION['message'] = 'Dit mailadres is in een fout formaat, vb: azerty@mail.be';
			header( 'location: register-form.php' );
		}
	}
	header( 'location: register-form.php' );
?>