<?php

include("include.php3");

?>


<table border="0" width="100%"><tr><td valign="top">

<a href="links.html">links</a> | <a href="../back.html" onMouseover="window.status='back to the previously viewed page'; return true" onMouseout="window.status=''; return true">back</a> | 
<a href="tocheck.html">to check</a>

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

$result = mysql_query("SELECT * FROM todo",$db);

//writes the intro shit

echo "<p>loops and prints 'rows' by setting which rows to print</p>\n";

//gets what's in the rows and prints

while ($myrow = mysql_fetch_row($result)) {
	printf("<li>%s %s %s\n", $myrow[1], $myrow[2], $myrow[3]);
}

//finishes by printing this shit

echo "</p><p><a href=\"todo_edit.html\">edit</a></p>";
?>

<!-- number 2 -->

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

$result = mysql_query("SELECT * FROM todo",$db);

if ($myrow = mysql_fetch_array($result)) {
  echo "<p>loops and gets row by specifying item in row to print with error handling</a>\n";
  do {
    printf("<li>%s %s %s</li>\n", $myrow["id"], $myrow["item"], $myrow["priority"]);
  } while ($myrow = mysql_fetch_array($result));
	echo "</p><p>done</a>\n";
} else {
	echo "Sorry, no records were found!";	
}
?>

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

$result = mysql_query("SELECT * FROM todo",$db);

if ($myrow = mysql_fetch_array($result)) {
	echo "<p>creates a link that connects to self to print only that record based on id number</p>";
  do {
    printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
  if ($id) {
   $result = mysql_query("SELECT * FROM todo WHERE id=$id",$db);
   $myrow = mysql_fetch_array($result);
   printf("<p>item: %s\n<br>", $myrow["item"]);
   printf("priority: %s\n<br></p>", $myrow["priority"]);
} else {
    // show employee list
   $result = mysql_query("SELECT * FROM todo",$db);
    if ($myrow = mysql_fetch_array($result)) {
      // display list if there are records to display
      do {
        printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
      } while ($myrow = mysql_fetch_array($result));
    } else {
      // no records to display
      echo "Sorry, no records were found!";	
    }
}
	} while ($myrow = mysql_fetch_array($result));
		
} else {
  echo "Sorry, no records were found!";	
}

?>

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
// display individual record
echo "<p>this prints based on id in the url, or if nothing specified, prints whole table with links to select by id</a>";
if ($id) {
   $result = mysql_query("SELECT * FROM todo WHERE id=$id",$db);
   $myrow = mysql_fetch_array($result);
   printf("<p>item: %s\n<br>", $myrow["item"]);
   printf("priority: %s\n<br></p>", $myrow["priority"]);
} else {
    // show employee list
   $result = mysql_query("SELECT * FROM todo",$db);
    if ($myrow = mysql_fetch_array($result)) {
      // display list if there are records to display
      do {
        printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
      } while ($myrow = mysql_fetch_array($result));
    } else {
      // no records to display
      echo "Sorry, no records were found!";	
    }
}
?>

<?php
echo "this has form that submits name values to php_self and also effects other dynamic values on page via post<br>";
if ($submit) {
  // process form
  while (list($name, $value) = each($HTTP_POST_VARS)) {
    echo "$name = $value<br>\n";
  }
} else{
  // display form
  ?>

  <form method="post" action="<?php echo $PHP_SELF?>">

  id:<input type="Text" name="id"><br>

  item:<input type="Text" name="item"><br>

  priority:<input type="Text" name="priority"><br>

  <input type="Submit" name="submit" value="Enter information">

  </form>
<?php
} // end if
?>


<?php

echo "this inserts into specified table in db via formfield<br>";
if ($submit) {
  // process form
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
  $sql = "INSERT INTO todo (id,item,priority) VALUES ('$id','$item','$priority')";
  $result = mysql_query($sql);
  echo "Thank you! Information entered.\n";
} else{
  // display form
  ?>
  <form method="post" action="<?php echo $PHP_SELF?>">

  id:<input type="Text" name="id"><br>
 item:<input type="Text" name="item"><br>

  priority:<input type="Text" name="priority"><br>

  <input type="Submit" name="submit" value="Enter information">

  </form>
  <?php
} // end if
?>




<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
echo "prints list of links by id then upon select allows to edit that row<br>oddly, this returns a new record, with next available id number<br>actually, this block does nothing.<br>";
if ($id) {
  // query the DB
  $sql = "SELECT * FROM todo WHERE id=$id";
  $result = mysql_query($sql);	
  $myrow = mysql_fetch_array($result);
  ?>
  <form method="post" action="<?php echo $PHP_SELF?>">
  <input type=hidden name="id" value="<?php echo $myrow["id"] ?>">
  item:<input type="Text" name="item" value="<?php echo $myrow["item"] ?>"><br>
  priority:<input type="Text" name="priority" value="<?php echo $myrow["priority"] ?>"><br>
  <input type="Submit" name="submit" value="Enter information">
  </form>
  <?php
} else {
  // display list of todo
  $result = mysql_query("SELECT * FROM todo",$db);
  while ($myrow = mysql_fetch_array($result)) {
    printf("<a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
  }
}
?>



<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
echo "<br><br>this block prints links, then upon select by id allows to edit individual rows<br>then upon submit, inserts into db<br>";
if ($id) {
  if ($submit) {
    $sql = "UPDATE todo SET item='$item',priority='$priority' WHERE id=$id";
    $result = mysql_query($sql);
    echo "Thank you! Information updated.\n";
  } else {
    // query the DB
    $sql = "SELECT * FROM todo WHERE id=$id";
    $result = mysql_query($sql);	
    $myrow = mysql_fetch_array($result);
    ?>
    <form method="post" action="<?php echo $PHP_SELF?>">
    <input type=hidden name="id" value="<?php echo $myrow["id"] ?>">
    item name:<input type="Text" name="item" value="<?php echo $myrow["item"] ?>"><br>
    priority name:<input type="Text" name="priority" value="<?php echo $myrow["priority"] ?>"><br>
    <input type="Submit" name="submit" value="Enter information">
    </form>
	<?php
	}
} else {
  // display list of todo
  $result = mysql_query("SELECT * FROM todo",$db);
  while ($myrow = mysql_fetch_array($result)) {
    printf("<a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
  }
}
?>

create table work (forwhom CHAR(64), name CHAR(64), id INT );

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
echo "<br><b></b>ok, this is the finale, item, if submitted...<br><br>";
if ($submit) {
  // here if no ID then adding else we're editing
  if ($id) {
    $sql = "UPDATE todo SET item='$item',priority='$priority' WHERE id=$id";
  } else {
    $sql = "INSERT INTO todo (item,priority) VALUES ('$item','$priority')";
  }
  // run SQL against the DB
  $result = mysql_query($sql);
  echo "Record updated/edited!<p>";
} elseif ($delete) {
	// delete a record
    $sql = "DELETE FROM todo WHERE id=$id";	
    $result = mysql_query($sql);
    echo "$sql Record deleted!<p>";
} else {
  // this part happens if we don't press submit
  if (!$id) {
    // print the list if there is not editing
    $result = mysql_query("SELECT * FROM todo",$db);
    while ($myrow = mysql_fetch_array($result)) {
      printf("<a href=\"%s?id=%s\">%s %s</a> \n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
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
    $sql = "SELECT * FROM todo WHERE id=$id";
    $result = mysql_query($sql);
    $myrow = mysql_fetch_array($result);
    $id = $myrow["id"];
    $item = $myrow["item"];
    $priority = $myrow["priority"];
    // print the id for editing
    ?>
    <input type=hidden name="id" value="<?php echo $id ?>">
    <?php
  }
  ?>
  item name:<input type="Text" name="item" value="<?php echo $item ?>"><br>
  priority name:<input type="Text" name="priority" value="<?php echo $priority ?>"><br>
  <input type="Submit" name="submit" value="Enter information">
  </form>
<?php
}
?>

<p><h1>begin new testing</h1></p>

<?php

include("include.php3");

?>

