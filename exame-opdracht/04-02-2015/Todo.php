<?php

session_start();

$message	=	'Voeg je todo\'s toe.';

//-----------------submit------------------

if (isset($_POST['submit']))
{
	if(isset($_POST['taak']))
	{
		$taken							=	array(trim($_POST['taak']));
		$_SESSION['todo-lijst'][]		=	$taken;
	}
}

//-----------------todo------------------

	//verwijder uit todo
	if(isset($_POST['todo-verwijderen']))
	{
		unset($_SESSION['todo-lijst'] [$_POST['todo-verwijderen']]);
	}

	//wijziging in todo
	if(isset($_POST['todo-wijzigen']))
	{
		$_SESSION['done-lijst'][]	=	$_SESSION['todo-lijst'] [$_POST['todo-wijzigen']];
		unset($_SESSION['todo-lijst'] [$_POST['todo-wijzigen']]);
	}

//-----------------done------------------

	//verwijder uit done
	if(isset($_POST['done-verwijderen']))
	{
		unset($_SESSION['done-lijst'] [$_POST['done-verwijderen']]);
	}

	//wijzig in done
	if(isset($_POST['done-wijzigen']))
	{
		$_SESSION['todo-lijst'][]	=	$_SESSION['done-lijst'] [$_POST['done-wijzigen']];
		unset($_SESSION['done-lijst'] [$_POST['done-wijzigen']]);
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>Todo</title>
</head> 
<body>

	<h1>Todo app</h1>

	 	<?php if ((!empty($_SESSION['todo-lijst']))||(!empty($_SESSION['done-lijst']))) : ?> 
			<h2>Nog te doen</h2>
			<ul>
				<?php foreach ($_SESSION['todo-lijst'] as $key => $todoTaken) : ?>
					<?php foreach($todoTaken as $taak):?>
						<li>
							<form method="POST" action="todo.php">
								<button class="not_done" value="<?= $key ?>" name="todo-wijzigen" titel="todo-wijzigen"><?= $taak?></button>
								<button class="del" value="<?= $key ?>" name="todo-verwijderen" titel="todo-verwijderen">verwijder</button>
							</form>
						</li>
					<?php endforeach ?>
				<?php endforeach ?>
			</ul>
			
				<?php if((empty($_SESSION['todo-lijst'])) && (!empty($_SESSION['done-lijst']))): ?>
					<p>goed gewerkt!</p>
				<?php endif ?>


			<h2>Done!</h2>
				<?php if (empty ($_SESSION['done-lijst'])): ?>
	        		<p>Niet uitstellen, doe de todo's nu!</p>
	      		<?php endif ?>

	 		<?php if (!empty($_SESSION['done-lijst'])) : ?> 		
				<ul>
					<?php foreach ($_SESSION['done-lijst'] as $key => $doneTaken) : ?>
						<?php foreach ($doneTaken as $taak) : ?>
							<li>
								<form method="POST" action="todo.php">
									<button class="done" value="<?= $key ?>" name="done-wijzigen" titel="done-wijzigen"><?= $taak?></button>
									<button class="del" value="<?= $key ?>" name="done-verwijderen" titel="done-verwijderen">verwijder</button>
								</form>
							</li>
						<?php endforeach ?>
					<?php endforeach ?>
				</ul>
			<?php endif ?>
		<?php endif ?>


	<?php if ((empty($_SESSION['todo-lijst']) && (empty($_SESSION['done-lijst'])))) : ?>
		<p><?= $message; ?></p>
	<?php endif ?>
		

		
	<h1>Todo toevoegen</h1>

		<form action= <?= $_SERVER ['PHP_SELF'] ?> method="POST">

				<ul>
					<li>
						<label for="taak">Todo-beschrijving: </label>
						<input type="text" name="taak" id="taak">
					</li>
				</ul>
			<input type="submit" name="submit" value="Toevoegen">
		</form>



</body>
</html>