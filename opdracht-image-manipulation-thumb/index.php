<?php

var_dump($_POST);

if (isset($_POST['file'])) 
{
	$imageFile	=	'img\\' . $_POST['file'];

	$fileParts	=	pathinfo($imageFile);
	$fileName	=	$fileParts['filename'];
	$ext		=	$fileParts['extension'];

	$thumbDimensions['w']	=	100;
	$thumbDimensions['h']	=	100;

	list($width, $height)	=	getimagesize($imageFile);

	$longestSide	=	$width;
	$shortestSide	=	$height;


	if($width < $height)
	{
		$longestSide	=	$height;
		$shortestSide	=	$width;
	}


}

var_dump($fileParts);
var_dump($_FILES);
var_dump($width);


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Image manipulation thumb</title>
<style>
label
{
	display: block;
}

h1
{
  font-weight: 200;
  border-bottom: 1px solid lightgrey;
}

ul
{
	list-style-type: none;
	padding: 0;
}

button
{
	display: block;
}

</style>
</head>
<body>

	<h1>Thumbnail genereren</h1>

		<form method="POST">
			<ul>
				<label>kies een foto</label>
				<input type="file" id="file" name="file">
			</ul>
			<input type="submit" name="submit" value="submit">
		</form>

		<img src="<?= 'img\\' . $fileName ?>_thumb.jpg">

</body>
</html>