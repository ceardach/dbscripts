#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('merge');
  } else {

    $dev_db = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : FALSE;
    $lastmerge_db = isset($_SERVER['argv'][2]) ? $_SERVER['argv'][2] : FALSE;
    $prod_db = isset($_SERVER['argv'][3]) ? $_SERVER['argv'][3] : FALSE;

    print dbscripts_merge($dev_db, $lastmerge_db, $prod_db);

  }
?>
