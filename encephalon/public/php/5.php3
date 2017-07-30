<?php

$title = "Hello World";

include("header.inc");

$result = mysql_query("SELECT * FROM my_table",$db);

echo "<table border=1>\n";

echo "<tr><td>name</td><td>name</td><td>tel</tr>\n";

while ($myrow = mysql_fetch_row($result)) {

	printf("<tr><td>%s</td><td>%s</td><td>%s</tr>\n", $myrow[0], $myrow[1], $myrow[2]);

	}

echo "</table>\n";

include("footer.inc");

?>
