<?php 

session_start();

$email	=	$_SESSION[ 'login' ][ 'email' ];

$profielfoto	=	false;

 ?>
<!DOCTYPE html>
	<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="public/css/global.css">
	</head>
	<body>

<h1>Gegevens wijzigen</h1>
                        
                        <form enctype="multipart/form-data" methode="POST" action="phpoefening-029-a-gegevens-wijzigen-form.php">
                            
                            <ul>
                                
                                <li>
                                    <label for="profile_picture">Profielfoto
                                        <img class="profile-picture" src="" alt="Profielfoto">
                                    </label>
                                    <input type="file" id="profile_picture" name="profile_picture">
                                </li>

                                <li>
                                    <label for="email">e-mail</label>
                                    <input type="text" id="email" name="email" value="<?= $email?>">
                                </li>

                            </ul>

                            <input type="submit" value="Gegevens wijzigen">
                        </form>


	</body>
</head>