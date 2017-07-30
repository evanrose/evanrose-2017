<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php

$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);

if ($id) {

  // query the DB

  $sql = "SELECT * FROM my_table WHERE id=$id";

  $result = mysql_query($sql);	

  $myrow = mysql_fetch_array($result);

  ?>



  <form method="post" action="<?php echo $PHP_SELF?>">

  <input type=hidden name="id" value="<?php echo $myrow["id"] ?>">

id:<input type="Text" name="id"><br>
name:<input type="Text" name="name"><br>
tel:<input type="Text" name="tel"><br>

  <input type="Submit" name="submit" value="Enter information">

  </form>



  <?php



} else {

  // display list of employees

  $result = mysql_query("SELECT * FROM my_table",$db);

  while ($myrow = mysql_fetch_array($result)) {

    printf("<a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["name"], $myrow["tel"]);

  }

}



?>



</body>
</html>
