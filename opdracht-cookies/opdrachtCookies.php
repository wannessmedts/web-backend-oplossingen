<?php

$fileName		=	'jan,paswoord01.txt';
$file			=	fopen ($fileName, 'rb');
$inhoud			=	fread ($file, filesize($fileName));
$loginError     =   fals;

$explode		=	explode(',', $inhoud);

$login			=	false;

var_dump($explode);

if (isset($_POST['username']) && isset($_POST['password']))
{
	if($_POST['username'] === $explode[0] && $_POST['password'] === $explode[1])
	{
		$login	=	true; 
	}
    else
    {
        $loginError =   true;
    }
}




?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>date oefening</title>

</head>

<body>

<h1>Inloggen</h1>



	<?php if ($login == true):?>

		<h2>Welkom op de site!</h2>

	<?php elseif ($login !== true): ?>

		<h3>Gebruikersnaam en/of paswoord niet correct. Probeer opnieuw.</h3>

			<form action="opdrachtCookies.php" method="post">
         	<ul>
             	<li>
                	 <label for="gebruikersnaam">gebruikersnaam</label>
                     <input type="text" id="gebruikersnaam" name="username" value="jan">
             	</li>
             	<li>
                 	<label for="paswoord">paswoord</label>
                 	<input type="password" id="paswoord" name="password" value="paswoord01">
            	 </li>
         	</ul>
         	<input type="submit" name="submit">
   			</form>

	<?php endif ?>

</body>
</html>