#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('erase');
  } else {
    $options = dbscripts_get_options($_SERVER['argv']);
    print dbscripts_erase($options['filter'], $options['sequences']);
  }
?>
