#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('erase');
  } else {
    $_SERVER['argv'][1] = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 'full';
    print dbscripts_erase($_SERVER['argv'][1]);
  }
?>
