#evanrose.com 2013

This version of the site used a new permalink scheme for old posts and has a system for fetching tumblr posts and tweets and creates a flat text file once per hour. Much of the admin code was altered and RSS feed generation was abandoned as the site hasn't been updated since 2014.

To run, rename src/credentials.inc.example.php src/credentials.inc.php and add credentials.

Create a cron job that hits /src/generator.php every hour

To create the entries table:

CREATE TABLE `entries` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `entry` longtext,
  `datetime` datetime DEFAULT NULL,
  `entry_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=615 DEFAULT CHARSET=latin1 PACK_KEYS=1;

To do 

Turn off chron job for fetching tumblr posts and tweets.
Keep credential.inc.php out of the repo
Updated .htaccess for new and old sites
Find cron job for generator.php