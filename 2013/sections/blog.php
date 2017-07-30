<?php

/*
$db = mysql_connect( $db_host, $db_user, $db_password );
mysql_select_db( $db_name ) or die ( mysql_error() . "\n\n" );
$get = "SELECT * from entries ORDER BY id DESC LIMIT 10;";
$response = mysql_query($get, $db);
//if (mysql_num_rows($response)) echo "<h2>Today's Drafts: <span class=\"normal\">".date("l, F jS, Y")."</span></h2>\n\n";
$lastdatetime = '';
if (mysql_num_rows($response)) 
while ($one_line_of_data=mysql_fetch_assoc($response)) {
	extract ( $one_line_of_data );
	echo $datetime;
}

*/

if (isset($_GET["year"])) $year_url = $_GET["year"];
if (isset($_GET["month"])) $month_url = $_GET["month"];
if (isset($_GET["date"])) $date_url = $_GET["date"];

?>

<div>

<h2>Blog Archive <?php if (isset($year_url)) echo ' of '. date("F", mktime(0, 0, 0, $month_url, 10)) . ' '. $year_url; ?></h2>

<form method="get" action="."><p><b>Navigate</b><br />
<select onchange="location=this.options[this.selectedIndex].value;">
<option>Select</option>
<?php

$db = mysql_connect( $db_host, $db_user, $db_password );
mysql_select_db( $db_name ) or die ( mysql_error() . "\n\n" );
$sql = "SELECT DISTINCT YEAR(datetime) as year, MONTH(datetime) as month from entries ORDER BY year DESC, month DESC";
$response = mysql_query($sql, $db);
//if (mysql_num_rows($response)) echo "<h2>Today's Drafts: <span class=\"normal\">".date("l, F jS, Y")."</span></h2>\n\n";

if (mysql_num_rows($response)) 
while ($one_line_of_data=mysql_fetch_assoc($response)) {
	extract ( $one_line_of_data );
	$month_name = date("F", mktime(0, 0, 0, $month, 10));
	echo '<option value="/blog/?year=' . $year . '&amp;month=' . $month . '">' . $month_name . ' ' . $year . '</option>';
}
?>

<option value="/blog/?date=0301">January 2003</option>
<option value="/blog/?date=0212">December 2002</option>
<option value="/blog/?date=0211">November 2002</option>
<option value="/blog/?date=0210">October 2002</option>
<option value="/blog/?date=0209">September 2002</option>
<option value="/blog/?date=0206">June 2002</option>
<option value="/blog/?date=0205">May 2002</option>
<option value="/blog/?date=0204">April 2002</option>
<option value="/blog/?date=0203">March 2002</option>
<option value="/blog/?date=0202">February 2002</option>
<option value="/blog/?date=0201">January 2002</option>
<option value="/blog/?date=0112">December 2001</option>
<option value="/blog/?date=0111">November 2001</option>
<option value="/blog/?ate=0110">October 2001</option>
<option value="/blog/?date=0109">September 2001</option>
<option value="/blog/?date=0108">August 2001</option>
<option value="/blog/?date=0107">July 2001</option>
<option value="/encephalon/">before</option>
</select></p></form>

<form method="get" action="http://www.google.com/custom"><p><b>Search</b><br />
<input type="text" class="input" size="10" name="q" /><input class="submit" type="submit" value="search" /><input type="hidden" name="domains" value="evanrose.com" /><input type="hidden" name="cof" value="S:http://evanrose.com;AH:center;AWFID:e114f272ce52fa44;" /><input type="hidden" name="sitesearch" value="evanrose.com" /></p></form>

</div>

<?php

	if (isset($date_url)) {
		
		echo '<div>';
		include 'archive/'.$date_url.'.html';
		echo '</div>';
	}
	elseif ( isset( $year_url )) {
			
			$sql = "SELECT * FROM `entries` where datetime between '". $year_url . "-" . $month_url. "-01' and '" . $year_url. "-" . $month_url. "-31' ORDER BY datetime DESC;";

		}
	elseif ( isset( $entry_title )) {

		$sql = "SELECT * from entries where entry_title LIKE '" . $entry_title . "'";
	}
	else {

		$sql = "SELECT * FROM entries ORDER BY id DESC LIMIT 10";
	}
		
$response = mysql_query($sql, $db);
//if (mysql_num_rows($response)) echo "<h2>Today's Drafts: <span class=\"normal\">".date("l, F jS, Y")."</span></h2>\n\n";
if (mysql_num_rows($response)) 
while ($one_line_of_data=mysql_fetch_assoc($response)) {
	extract ( $one_line_of_data ); 

	$entry_slug = strtolower(str_replace(' ','-',$entry_title));
	$datetime = date("l, F jS, Y", strtotime( $datetime ));
		
	if ( $lastdatetime == $datetime ) {
		$datetime = 0;
	}
	else {
		$lastdatetime = $datetime;
	}

	if ( $datetime ) {
		$date_div = '<div class="datetime"><h3>' . $datetime . '</h3></div>';
	}
	else $date_div = '';
	


	
	echo $str = '<div class="entry">' . $date_div . '<h4><a href="/blog/' . $entry_slug . '" title="Evan Rose">'.$entry_title.'</a></h4><p>'.$entry.'</p><p class="right"><a class="smallright" href="/blog/' . $entry_slug . '" title="Evan Rose">evanrose.com permalink</a></p></div>' . "\n";

}