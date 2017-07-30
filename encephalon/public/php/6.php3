<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php



function  do_error($error) {

	echo  "Hmm, looks like there was a problem here...<br>";

	echo "The reported error was $error.\n<br>";

	echo "you best let a motherfucker know, yo!";

	die;

}



if (!$db = @mysql_connect("oak.he.net", "evanrose", "t3zydodx")) {

	$db_error = "Could not connect to MySQL Server";

	do_error($db_error);

}

?>


</body>
</html>
