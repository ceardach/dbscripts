#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('merge');
  } else {
    print dbscripts_merge($_SERVER['argv']);
  }
?>
