#!/usr/bin/env php
<?php
  require('dbscripts.module');
  $options = dbscripts_get_options($_SERVER['argv']);
  print dbscripts_restore($options['file'],$options['filter'],$options['sequences'],$options['help']);
?>
