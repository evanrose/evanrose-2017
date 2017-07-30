<?php

$db = mysql_connect( $db_host, $db_user, $db_password );
mysql_select_db( $db_name ) or die ( mysql_error() . "\n\n" );
$get = "SELECT * from entries ORDER BY id DESC LIMIT 10;";
$response = mysql_query($get, $db);
//if (mysql_num_rows($response)) echo "<h2>Today's Drafts: <span class=\"normal\">".date("l, F jS, Y")."</span></h2>\n\n";
$lastdatetime = '';
if (mysql_num_rows($response)) 
while ($one_line_of_data=mysql_fetch_assoc($response)) {
	extract ( $one_line_of_data );
	
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

	$entry_slug = strtolower(str_replace(' ', '-', $entry_title));
	


	
	echo $str = '<div class="entry">' . $date_div . '<h4><a href="/blog/' . $entry_slug . '" title="Evan Rose">'.$entry_title.'</a></h4><p>'.$entry.'</p><p class="right"><a class="smallright" href="/blog/' . $entry_slug . '" title="Evan Rose">evanrose.com permalink</a></p></div>' . "\n";
}