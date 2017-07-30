<html>
<head>
<title>PHP Test</title>
</head>
<body>

<?php

$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");

mysql_select_db("evanrose",$db);

$result = mysql_query("SELECT * FROM my_table where id=4",$db);

if ($myrow = mysql_fetch_array($result)) {

  echo "<table border=1>\n";

  echo "<tr><td>id</td><td>name</td><td>number</td></tr>\n";

  do {

    printf("<tr><td>%s</td><td>%s</td><td>%s</tr>\n", $myrow["id"], $myrow["name"], $myrow["tel"]);

  } while ($myrow = mysql_fetch_array($result));

	echo "</table>\n";

} else {

	echo "fuck that, yo.";	

}

?>


</body>
</html>
