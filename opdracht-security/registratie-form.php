<?php 
	session_start();
?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>registreer</title>
 	<style type="text/css">
body
{
	font-family:'Segoe UI Semilight','Segoe UI',Tahoma,Helvetica,sans-serif;
	color:#454545;
}

a
{
	color:#454545;
}

a:hover
{
	text-decoration:none;
}

h1, h2, h3, h4, h5, h6
{
	font-weight:200;
	border-bottom:1px solid lightgrey;
}

h1, h2 
{
    font-size: 32px;
}

h3, h4 
{
    font-size: 24px;
}

table
{
    margin:12px 0;
    border:1px solid lightgrey;
    border-collapse: collapse;
}

td, th
{
    padding:16px;
    border:1px solid lightgrey;
}

pre
{
	font-size: 24px;
}

li
{
	margin-bottom:12px;
}

img
{
	border	:	1px solid lightgrey;
	max-width: 100%;
}

form ul
{
	list-style-type:none;
	padding:0px;
}

form label
{
	display:block;
}

ul ul
{
	margin-top:1em;
}

 	</style>
 </head>
 <body>

 	<h1>Registratie</h1>

 	<?php if(isset($_SESSION['notification'])): ?>

 		<p><?= $_SESSION['notification'] ?></p>

 	<?php endif ?>

 	<form action="registratie-process.php" method="post">
							
					<ul>
						<li>
							<label for="e-mail">e-mail </label>
							<input type="text" name="e-mail" id="e-mail" value="">
						</li>
						<li>
							<label for="password">Paswoord </label><input type="text" name="password" id="password" value="">
						</li>
					</ul>
					<input type="submit" name="submit" value="Registreer">
			</form>

 
 </body>
 </html>