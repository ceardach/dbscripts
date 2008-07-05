#!/usr/bin/env php
<?php
  require('dbscripts.module');
  $options = $_SERVER['argv'];
  print dbscripts_merge($options[1],$options[2],$options[3],$options['help']);
?>
