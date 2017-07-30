<?php

include( dirname(__FILE__) . '/credentials.inc.php' );

$archive_dir = '/2013';

$db = mysql_connect( $db_host, $db_user, $db_password );
//$db = new mysqli('127.0.0.1', 'root', '5ba9e20q', 'dbdrowssap1');
if ($db->connect_errno > 0) die('Unable to connect to database [' . $db->connect_error . ']');
//catch old section= urls
if (isset($_GET["section"])) {
	$section = $_GET["section"];
	$date = '';
	if ($section == 'archive') {
		$section = 'blog';
		if (isset($_GET["date"])) $date = '/?date=' . $_GET["date"];
	}
	header('HTTP/1.1 301 Moved Permanently');
	header('location:/' . $section . $date);
	exit;
}
if (isset($_GET["entry"])) {		
	$id = $_GET["entry"];
	$sql = 'SELECT entry_title from entries where id = ' . $id;
	if( !$result = $db->query( $sql )) die('There was an error running the query [' . $db->error . ']');
	while( $row = $result->fetch_assoc()) $entry_title = $row['entry_title'];
	$entry_slug = strtolower(str_replace(' ', '-', $entry_title));
	header('HTTP/1.1 301 Moved Permanently');
	header('location:/blog/'.$entry_slug);
}

date_default_timezone_set('America/New_York');

//set section
$requestURI = explode('/', $_SERVER['REQUEST_URI']);
$section = $requestURI[2];
if (empty($section)) $section = 'news';

//check blog page type

$entry_page_title = '';

if (empty($requestURI[3]) || $requestURI[3][0] == '?') $entry_list = 1;
else {
	$single_entry = 1;
	$entry_title = str_replace('-', ' ', urldecode($requestURI[3]));
	$entry_page_title = ' | ' . ucwords($entry_title);
}
//header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
$page_title = 'Evan Rose | ' . ucfirst($section) . $entry_page_title;

$file_name = $_SERVER['DOCUMENT_ROOT'] . '/sections/' . $section . '.php';
	/*
	if (!file_exists($file_name)) {
		header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found", true, 404);
		$section = 0;
	}
	*/
$error_text = '<div><h2>Error</h2><p>The link you clicked through doesn\'t lead anywhere, or another error has occurred. <a href="mailto:evan&#64;evanrose.com">Please let me know what happened</a> so I can fix it, or choose another link to follow.</p></div>';