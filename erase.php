#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('erase');
  } else {
   print dbscripts_erase($_SERVER['argv']);
 }
?>
