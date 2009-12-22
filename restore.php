#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('restore');
  } else {
   print dbscripts_restore($_SERVER['argv']);
  }
?>
