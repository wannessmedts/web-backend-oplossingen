<?php 

include 'app/init.php';

?>
<!DOCTYPE html>
<html lang="eng">
	<head>
		<meta charset="UTF-8">
		<title>Login</title>

		<link rel="stylesheet" href="css/main.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<body>
		<div class="list">
			<h1 class="header">Login</h1>

			<form class="item-add" action="login.php" method="post">
				<input type="email" name="email" placeholder="email" class="input">
				<input type="password" name="paswoord" placeholder="paswoord" class="input">
				<input type="submit" value="submit" name="submit" class="submit">
				<a class="register" href="register-form.php">Registreren</a>
			</form>
		</div>
	</body>
</html>