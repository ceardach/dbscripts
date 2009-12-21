#!/usr/bin/env php
<?php
  require('dbscripts.module');
  require('config.inc');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('find');
  } else {
    print dbscripts_find($_SERVER['argv']);
  }
?>