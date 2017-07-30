<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php

$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

if ($submit) {

  // here if no ID then adding else we're editing

  if ($id) {

    $sql = "UPDATE my_table SET id='$id',name='$name',tel='$tel' WHERE id=$id";

  } else {

    $sql = "INSERT INTO my_table (id,name,tel) VALUES ('$id','$name','$tel')";

  }

  // run SQL against the DB

  $result = mysql_query($sql);

  echo "Record updated/edited!<p>";

} elseif ($delete) {

	// delete a record

    $sql = "DELETE FROM my_table WHERE id=$id";	

    $result = mysql_query($sql);

    echo "$sql Record deleted!<p>";

} else {

  // this part happens if we don't press submit

  if (!$id) {

    // print the list if there is not editing

    $result = mysql_query("SELECT * FROM my_table",$db);

    while ($myrow = mysql_fetch_array($result)) {

      printf("<a href=\"%s?id=%s\">%s %s</a> \n", $PHP_SELF, $myrow["id"], $myrow["name"], $myrow["tel"]);

	  printf("<a href=\"%s?id=%s&delete=yes\">(DELETE)</a><br>", $PHP_SELF, $myrow["id"]);

    }

  }



  ?>

  <P>

  <a href="<?php echo $PHP_SELF?>">ADD A RECORD</a>

  <P>

  <form method="post" action="<?php echo $PHP_SELF?>">

  <?php



  if ($id) {

    // editing so select a record

    $sql = "SELECT * FROM my_table WHERE id=$id";

    $result = mysql_query($sql);

    $myrow = mysql_fetch_array($result);

    $id = $myrow["id"];

    $name = $myrow["name"];

    $tel = $myrow["tel"];

    // print the id for editing



    ?>

    <input type=hidden name="id" value="<?php echo $id ?>">

    <?php

  }



  ?>

  name:<input type="Text" name="tel" value="<?php echo $name ?>"><br>

  tel:<input type="Text" name="tel" value="<?php echo $tel ?>"><br>

  <input type="Submit" name="submit" value="Enter information">

  </form>



<?php



}



?>



</body>
</html>
