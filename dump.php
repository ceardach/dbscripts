#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('dump');
  } else {
    $options = dbscripts_get_options($_SERVER['argv']);
    print dbscripts_dump($options['file'],$options['filter']);
  }
?>
