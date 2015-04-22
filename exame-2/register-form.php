<?php 

include 'app/init.php';

?>
<!DOCTYPE html>
<html lang="eng">
  <head>
    <meta charset="UTF-8">
    <title>Registreren</title>

    <link rel="stylesheet" href="css/main.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  </head>
<body>

  <div class="list">
    <h1 class="header">Registreren</h1>
      <?php if ( !empty($_SESSION['message'])): ?>
        <div>
          <p><?= $_SESSION['message'] ?></p>
        </div>
      <?php endif ?>
    <form class="item-add" action="registratie.php" method="post"> 
        <input type="email" name="email" placeholder="email" class="input">
        <input type="password" name="paswoord" placeholder="paswoord" class="input">
        <input type="submit" value="Registreren" name="Registreren" class="submit">
    </form>
  </div>  
</body>
</html>