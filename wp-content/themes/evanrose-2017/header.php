<!doctype html>
<html lang="en">
<head>
<title><?php bloginfo( 'name') ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?php bloginfo( 'description') ?>">
<link href="//fonts.googleapis.com/css?family=Lato" rel="stylesheet">
<?php wp_head(); ?>
</head>
<body>

<header style="position: fixed;">
	<nav>
		<div class="h1-container">
			<h1><a href=""><?php bloginfo( 'name') ?></a></h1>
			
			<?php echo er_nav_menu(); ?>
		</div>
	</nav>
</header>