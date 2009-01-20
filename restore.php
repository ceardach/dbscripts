#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('restore');
  } else {
    $options = dbscripts_get_options($_SERVER['argv']);
    print dbscripts_restore($options['file'],$options['filter'],$options['sequences']);
  }
?>
