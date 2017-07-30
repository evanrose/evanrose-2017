<?php

include("include.php3");

?>

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
// display individual record
echo "<p>this prints based on id in the url, or if nothing specified, prints whole table with links to select by id</a>";

if ($id) 
	{
		$result = mysql_query("SELECT * FROM todo", $db);
	
		if ($myrow = mysql_fetch_array($result)) 
			{
  		// display list if there are records to display
				do 
					{
						$result = mysql_query("SELECT * FROM todo WHERE id=$id",$db);
						$myrow = mysql_fetch_array($result);
						printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
						printf("<p>item: %s\n<br>", $myrow["item"]);
						printf("priority: %s\n<br></p>", $myrow["priority"]);
    
					} 
				while ($myrow = mysql_fetch_array($result));
			} 
		else 
			{
				$result = mysql_query("SELECT * FROM todo", $db);
				$myrow = mysql_fetch_array($result);
				printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
			}
	}
else 
	{
		$result = mysql_query("SELECT * FROM todo", $db);
		$myrow = mysql_fetch_array($result);
		printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);
	}	

?>