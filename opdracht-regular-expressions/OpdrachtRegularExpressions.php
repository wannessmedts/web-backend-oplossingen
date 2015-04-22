<?php

$replaceString = '#';

if (isset($_POST['submit']))
{
$expression		=	$_POST['regex'];
$matchString	=	$_POST['string'];

	if(preg_match("/" . $expression . "/" , $matchString))
	{
		preg_match_all("/" . $expression . "/" , $matchString, $terugWaard);
		
		$message	=	$terugWaard;
	}
	else
	{
		$message	= 'Geen match gevonden.';
	}
}

var_dump($_POST);
 ?>

<html>
<head>
	<title>Regular Expressions</title>

<style>

    .result span
    {
        color:  red;
        font-weight:    bold;
    }

    label, input
    {
    	display: block;
    }

    ul	
    {
    	list-style-type: none;
    }

</style>

</head>
<body>

                        
<h1>RegEx tester</h1>

	<form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">

		<ul>
		    <li>
		        <label for="regex">Regular Expression</label>
		        <input type="text" name="regex" id="regex" value="<?php if(isset($expression)): echo $expression ?><?php endif ?>">
		    </li>
		    <li>
		        <label for="string">String</label>                            
		        <input name="string" id="string" height="30px" width="10px" value="<?php if(isset($matchString)): echo $matchString ?><?php endif ?>"></input>
		    </li>
		    <input type="submit" name="submit" value="submit" class="submit">
		</ul>

	</form>

	<p><?php if(isset($message)) echo $message ?></p>



</body>
</html>