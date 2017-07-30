<?php include('src/handle.inc.php'); ?>

<!DOCTYPE html>

<html lang="en">
<head>
<title><?php echo $page_title; ?></title>

<meta charset="utf-8"> 
<meta name="author" content="Evan Rose" />
<meta name="description" content="Evan Rose is, among other things, a web developer and IT consultant in New York City." />
<meta name="keywords" content="Evan, Rose, Web, Design, Development, Mac, Apple, Consulting, Encephalon, Dallas, San Francisco, New York, Blogs, Weblogs, Personal, Website, Web Site" />

<link rel="stylesheet" type="text/css" media="screen" href="<?php echo $archive_dir; ?>/css/styles.css" title="default" />
<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo $archive_dir; ?>/rss/index.xml" />
<link rel="shortcut icon" href="favicon.ico" />
</head>

<body>

	<div id="container">
		<div id="title">
			<h1><a href="/" title="Evan Rose">Evan Rose</a></h1>

			<?php if ($section=='news') { ?>

				<p id="about">...was born in Dallas, Texas, traveled, lived in the Bay Area, DJed, studied architecture, collected furniture, played drums, and is now a web developer and IT consultant in New York City. <a href="/about" title="About Evan Rose">Here's more</a>.</p>
			
			<?php } elseif (isset($error) && $error=='true') echo $error_text; ?>

			<p class="right"><a href="/" title="Evan Rose">Home</a> | <a href="about" title="About Evan Rose">About</a> | <a href="blog" title="evanrose.com Blog Archives">Blog Archive</a> | <a href="mailto:evan&#64;evanrose.com" title="Contact Evan Rose">Contact</a> | <a href="rss/index.xml">RSS</a> | <a href="work" title="Evan Rose's Work">Work</a> | <a href="http://facebook.com/evan.rose" title="Evan Rose Facebook">Facebook</a> | <a href="https://plus.google.com/117962925924433136310?rel=author">G+</a> | <a href="http://instagram.com/evanallenrose" title="Evan Rose Instagram">Instagram</a> | <a href="http://www.linkedin.com/pub/evan-rose/0/42/10a" title="Evan Rose Linkedin">Linkedin</a> | <a href="http://evanrose.tumblr.com" title="Evan Rose Tumblr">Tumblr</a> | <a href="http://twitter.com/evanrose" title="Evan Rose Twitter">Twitter</a></p>

		</div>
	
		<?php if ($section=='news') : ?>

			<div id="consults">
			
				<h2>Works</h2>
				
				<p>I build dynamic websites, web applications, and content management systems using PHP, MySQL, XHTML, CSS and more, and assist small businesses and individuals with their Apple products and networks. <a href="/work" title="Evan Rose's Work">Here's more</a>.</p>
				
				<p class="right"><a href="/work" title="Evan Rose's Work">Clients</a> | <a href="/work#consultation" title="Evan Rose's Work">IT Consultation</a> | <a href="/work#development" title="Evan Rose's Work">Web Development</a> | <a href="/resume" title="Evan Rose's Resum&eacute;">Resum&eacute;</a></p>
			
			</div>
			
			<div id="photographs">
			
				<h2>Photographs</h2>
				
				<div id="flickr_badge_container">
				
					<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=8display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=95511779%40N00"></script>
				
				</div>
			
				<p class="right"><a href="http://flickr.com/photos/evanrose" title="Evan Rose Flickr">Evan Rose on Flickr</a></p>
			
			</div>

		<?php endif; ?>

		<?php
		
			if ( $section ) include( 'sections/' . $section . '.php' );
			else echo $error_text;
		?>
	
		<p class="footer">All content &copy; by Evan Rose 1999-<?php echo date("Y"); ?> unless otherwise specified.<br/> Usually valid <a href="http://validator.w3.org/check/referer">HTML 5</a>, <a href="http://jigsaw.w3.org/css-validator/validator?uri=http://evanrose.com/">CSS</a> and <a href="http://feedvalidator.org/check?url=http://evanrose.com/rss/index.xml">RSS</a></p>

	</div>
</body>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85517677-1', 'auto');
  ga('send', 'pageview');
</script>
</html>