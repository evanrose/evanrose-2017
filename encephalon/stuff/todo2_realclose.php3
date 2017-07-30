<?php include("include.php3"); ?>

<?php
$db = mysql_connect("oak.he.net", "evanrose", "t3zydodx");
mysql_select_db("evanrose",$db);
$result = mysql_query("SELECT * FROM todo",$db);

if ($myrow = mysql_fetch_array($result)) 
	{
	do 
		{
		printf("<li><a href=\"%s?id=%s\">%s %s</a><br>\n", $PHP_SELF, $myrow["id"], $myrow["item"], $myrow["priority"]);

		if ($id == $myrow["id"]) 
			{
   		$result1 = mysql_query("SELECT * FROM todo WHERE id=$id",$db);
   		$myrow1 = mysql_fetch_array($result1);
			echo ($id);
			}
		else 
			{
			echo "";
			}
		}
	while ($myrow = mysql_fetch_array($result));
	}

?>