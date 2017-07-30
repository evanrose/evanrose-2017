<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php



if ($submit) {

  // process form

$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

  $sql = "INSERT INTO my_table (id,name,tel) VALUES ('$id','$name','$tel')";

  $result = mysql_query($sql);

  echo "Thank you! Information entered.\n";

} else{



  // display form



  ?>



<form method="post" action="<?php echo $PHP_SELF?>">
id:<input type="Text" name="id"><br>
name:<input type="Text" name="name"><br>
tel:<input type="Text" name="tel"><br>

  <input type="Submit" name="submit" value="Enter information">

  </form>



  <?php



} // end if



?>







</body>
</html>
