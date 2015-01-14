<?php

$username	=	'wannes';
$password	=	'azerty';

$isloggedin	=	false;
$message	=	false;

if (isset( $_post[ 'submit']))
{
	$usernameInput	=	$_post[ 'username'];
	$passwordInput	=	$_post[ 'username'];

	if ( $username == $usernameInput && $password == $passwordInput)
	{
		$isloggedin	=	true;
	}
	else
	{
		$message = 'Login mislukt.';
	}
}





?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>opdracht post</title>
<meta http-equiv='Content-Type' content='text/html;charset=utf-8' />
</head>
<body>

<h1>inloggen</h1>

	<?php if ( $isloggedin) : ?>

			<p>welkom!</p>

	<?php else: ?>

			<form action= <?= $_SERVER ['PHP_SELF'] ?> method="post">
				<ul>
					<li>
						<label for="name">Gebruikersnaam:</label>
						<input type= "text" name="naam" id="naam">
					</li>
					<li>
						<label for="name">paswoord:</label>
					 	<input type="text" name="password" id="password">
					</li>
				</ul>
	
				<input type="submit" value="submit" name="submit">
			</form>

	<?php endif ?>

</body>
</html>