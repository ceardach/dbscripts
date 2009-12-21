#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('dump');
  } else {;
    print dbscripts_dump($_SERVER['argv']);
  }
?>
