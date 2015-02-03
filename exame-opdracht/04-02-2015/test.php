<?php
  
  session_start();
  $error    = '';
  $alles_gedaan= "Schouderklopje, alles is gedaan!";
//Alles verwijderen
  if (isset($_GET['session']))
  {
    if($_GET['session'] === 'verwijder')
    {
      session_destroy();
      header('Location: test.php');
    }
  }
//Als er op de knop "Toevoegen" is gedrukt...
  if (isset($_POST['submit'])) 
  {
    //Als het veld "Beschrijving" niet leeg is
    if(!empty($_POST['beschrijving']))
    {
      $lijst = array($_POST['beschrijving']);
      $_SESSION['todo'][] = $lijst;  
    }
    //Als het veld "Beschrijving" leeg is
    if(empty($_POST['beschrijving'])) 
    {
        $error  = 'Oei, hier liep iets mis. Er is geen Todo ingevuld.';      
    }
  }
//Verwijder één element uit todo
  if (isset($_POST['verwijder_todo'])) 
  {
    unset($_SESSION['todo'] [$_POST['verwijder_todo']]);
    header('Location: test.php');
  }
//Verwijder één element uit done
  if (isset($_POST['verwijder_done'])) 
  {
    unset($_SESSION['done'] [$_POST['verwijder_done']]);
    header('Location: test.php');
  }
//Wijzig één element uit todo
  if (isset($_POST['wijzigen_todo']))
  {
    $_SESSION['done'][] = $_SESSION['todo'][$_POST['wijzigen_todo']];
    unset($_SESSION['todo'] [$_POST['wijzigen_todo']]);
  }
//Wijzig één element uit done
  if (isset($_POST['wijzigen_done']))
  {
    $_SESSION['todo'][] = $_SESSION['done'][$_POST['wijzigen_done']];
    unset($_SESSION['done'] [$_POST['wijzigen_done']]);
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/style.css" rel="stylesheet">
    <title>Examen 1: Todo App</title>
  </head>

  <body>
    <p class="error"><?= $error ?></p>
    <h1>Todo app</h1>

  
    <?php if ((!isset($_POST['beschrijving']))&& (empty($_SESSION['todo'])) && (empty($_SESSION['done']))):?>
      <p>Je hebt nog geen TODO's toegevoegd. Zo weinig werk of meesterplanner?</p>
    <?php endif ?>


    <?php if ((!empty($_SESSION['todo']))||(!empty($_SESSION['done']))): ?>
      <h2>Nog te doen</h2>
      <ul>
        <?php foreach ( $_SESSION['todo'] as $key => $beschrijving): ?>
          <?php foreach($beschrijving as $id =>$beschrijving):?>
              <li>
                <form method="POST" action="test.php">
                  <button class="not_done" value="<?php echo $key ?>" name="wijzigen_todo" title="Status wijzigen"><?= $beschrijving ?></button>
                  <button class="verwijder" value="<?php echo $key ?>" name="verwijder_todo" title="verwijderen">Verwijder</button>
                </form>
              </li>
          <?php endforeach ?>
        <?php endforeach ?>
      </ul>


      <?php if ((empty($_SESSION['todo'])) && (!empty($_SESSION['done']))): ?>
        <p>Schouderklopje, alles is gedaan!</p>
      <?php endif ?>


      <h2>Done and done!</h2>
      <?php if (empty ($_SESSION['done'])): ?>
        <p>werk aan de winkel...</p>
      <?php endif ?>


      <?php if (!empty ($_SESSION['done'])): ?>
        <ul>
          <?php foreach ( $_SESSION['done'] as $key => $beschrijving): ?>
            <?php foreach($beschrijving as $id =>$beschrijving):?>
                <li>
                  <form method="POST" action="test.php">
                    <button class="done" value="<?php echo $key ?>" name="wijzigen_done" title="Status wijzigen"><?= $beschrijving ?></button>
                    <button class="verwijder" value="<?php echo $key ?>" name="verwijder_done" title="verwijderen">Verwijder</button>
                  </form>
                </li>
            <?php endforeach ?>
          <?php endforeach ?>
        </ul>
      <?php endif ?>


      <a href="test.php?session=verwijder">Verwijder alles</a>

    <?php endif ?>


    <h1>Todo toevoegen</h1>
    <form action="test.php" method="POST">
      <ul>
        <li>
          <label for="beschrijving">Beschrijving:</label>
          <input type="text" id="beschrijving" name="beschrijving">
        </li>
      </ul>
      <input type="submit" name="submit" value="Toevoegen"> 
    </form> 


  </body>
</html>