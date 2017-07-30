<?php

$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);

?>

<html>

<head>

<title>

<?php echo $title ?>

</title>

</head>

<body>

<center><h2><?php echo $title ?></h2></center>