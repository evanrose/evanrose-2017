

<html>
<head>
	<title>Untitled</title>
</head>

<body>
<?php



$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

// display individual record

if ($id) {

   $result = mysql_query("SELECT * FROM my_table WHERE id=$id",$db);

   $myrow = mysql_fetch_array($result);

   printf("First name: %s\n<br>", $myrow["name"]);

   printf("tel: %s\n<br>", $myrow["tel"]);

} else {

    // show employee list

   $result = mysql_query("SELECT * FROM my_table",$db);

    if ($myrow = mysql_fetch_array($result)) {

      // display list if there are records to display

      do {

        printf("<a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["name"], $myrow["tel"]);

      } while ($myrow = mysql_fetch_array($result));

    } else {

      // no records to display

      echo "Sorry, no records were found!";	

    }

}



?>




</body>
</html>
