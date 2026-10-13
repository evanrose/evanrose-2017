<?php

date_default_timezone_set('America/New_York');

include( dirname(__FILE__) . '/credentials.inc.php' );

$db = new mysqli( $db_host , $db_user, $db_password, $db_name);
if ($db->connect_errno > 0) die('Unable to connect to database [' . $db->connect_error . ']');

$archive = $_GET["section"] ?? null;
$date = $_GET["date"] ?? null;
$entry = $_GET["entry"] ?? null;

// Catch old section= urls

if (isset($archive) && $archive == 'archive') {
	$section = 'blog';
	if (isset($date)) $date = '/?date=' . $date;
	header('HTTP/1.1 301 Moved Permanently');
	header('location:/' . $section . $date);
	exit;
}

// Catch entry=id posts
elseif (isset($entry)) {		
	$sql = 'SELECT entry_title from entries where id = ' . $entry;
	if( !$result = $db->query( $sql )) die('There was an error running the query [' . $db->error . ']');
	while( $row = $result->fetch_assoc()) $entry_title = $row['entry_title'];
	$entry_slug = strtolower(str_replace(' ', '-', $entry_title));
	header('HTTP/1.1 301 Moved Permanently');
	header('location:/blog/' . $entry_slug);
	exit;
}
else {

	// Set section

	$error = null;
	$sections = ['about', 'archive', 'blog', 'news', 'work'];
	$requestURI = explode('/', $_SERVER['REQUEST_URI']);
	$section = $requestURI[2];
	if (empty($section)) {
		$section = 'news';
	}
	elseif(in_array($section, $sections)) {

	}
	else {
		$error = 1;
	}

	// Check blog page type

	$entry_page_title = null;

	if (empty($requestURI[3]) || $requestURI[3][0] == '?') $entry_list = 1;
	else {
		$single_entry = 1;
		$entry_title = str_replace('-', ' ', urldecode($requestURI[3]));
		$entry_page_title = ' | ' . ucwords($entry_title);
	}
	$page_title = 'Evan Rose | ' . ucfirst($section) . $entry_page_title;

	$error_text = '<div><h2>Error</h2><p>The link you clicked through doesn\'t lead anywhere, or another error has occurred. <a href="mailto:evan&#64;evanrose.com">Please let me know what happened</a> so I can fix it, or choose another link to follow.</p></div>';

	$archive_dir = '/2013';

	/* 2026 */

	$dr = '/2013/';
}