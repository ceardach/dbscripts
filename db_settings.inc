<?php
require('config.inc');
require($settings_path.'/settings.php');

function get_db_settings() {
  global $db_url;
  preg_match('/'.$dbtype.':\/\/([^:]+):([^@]+)@([^\/]+)\/(.+)/', $db_url, $matches);
  return $matches;
}

$dbsettings = get_db_settings();

$dbuser = $dbsettings[1];
$dbpassword = $dbsettings[2];
$dbhost = $dbsettings[3];
$dbname = $dbsettings[4];

$db_connection_settings = "-u $dbuser -p$dbpassword -h $dbhost $dbname";