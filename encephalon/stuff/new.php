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
	 }
	 else { echo ("");
	 }
	 }
	 else { echo ("");
	 }