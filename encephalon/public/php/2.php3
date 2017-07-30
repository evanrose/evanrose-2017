<html>
<head>
<title>PHP Test</title>
</head>
<body>

<?php



$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

$result = mysql_query("SELECT * FROM my_table",$db);

if ($myrow = mysql_fetch_array($result)) {

  do {

    printf("<a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["name"], $myrow["tel"]);

  } while ($myrow = mysql_fetch_array($result));

} else {

  echo "Sorry, no records were found!";	

}

?>


</body>
</html>
