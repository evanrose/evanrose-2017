<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php

if ($submit) 
	{
	if (!ereg("[a-Z]", $name) || !ereg("[a-Z]", $tel)) 
		{
			$error = "Sorry! You didn't fill in all the fields!";
		} 
	else 
		{
			// process form
			echo "Thank You!";
		}
	}
if (!$submit || $error) 
	{
		echo $error;
	?>

		<P>
		<form method="post" action="<?php echo $PHP_SELF ?>">
		FIELD 1: <input type="text" name="first" value="<?php echo $name ?>"><br>
		FIELD 2: <input type="text" name="last" value="<?php echo $tel ?>"><br>
		<input type="Submit" name="submit" value="Enter Information">
		</form>

	<?php

	} // end if

?>



</body>
</html>
