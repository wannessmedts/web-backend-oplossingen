<?php 

include 'app/init.php';

$query	='SELECT id, naam, done
			FROM items
			WHERE user = :user
			';

$itemsQuery	=	$db->prepare($query);

$itemsQuery->execute([
		'user'=> $_SESSION['user_id']
	]);

$items 	=	$itemsQuery->rowCount() ? $itemsQuery : [];

?>

<!DOCTYPE html>
<html lang="eng">
	<head>
		<meta charset="UTF-8">
		<title>To do</title>

		<link rel="stylesheet" href="css/main.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

	</head>
	<body>
		<div class="list">
			<h1 class="header">To do</h1>

			<form action="add.php" method="post">

			<?php if(!empty($items)): ?>
				<ul class="items">
					<?php foreach($items as $item): ?>
						<?php if ($item['done']==0): ?>
							<li>
								<span class="item<?= $item['done'] ? ' done': '' ?>"><?= $item['naam'] ?></span>
								<?php  if(!$item['done']): ?>
									<a href="mark.php?as=done&item=<?= $item['id']; ?>" class="done-button">Done</a>
								<?php endif; ?>
							</li>
						<?php else: ?>
							<li>
								<span class="item<?= $item['done'] ? ' done': '' ?>"><?= $item['naam'] ?></span>
								<?php  if($item['done']): ?>
									<a href="mark.php?as=notdone&item=<?= $item['id']; ?>" class="done-button">Do</a>
								<?php endif; ?>
							</li>
						<?php endif ?>
					<?php endforeach; ?>
				</ul>

			<?php else: ?>

				<p>Heb je niets te doen?</p>

			<?php endif; ?>

			</form>

			<form class="item-add" action="add.php" method="post">
				<input type="text" name="naam" placeholder="Voeg een item toe" class="input" autocomplete="off">
				<input type="submit" value="Toevoegen" class="submit">
				<a class="register logout" href="logout.php">Log out</a>
			</form>


		</div>
	</body>
</html>