#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('find');
  } else {
    $options = $_SERVER['argv'];
    if (isset($options[1]) && $options[1] == 'increment') {
      $branch = isset($options[2]) ? $options[2] : 'development';
      $filter_option = isset($options[3]) ? $options[3] : 'full';
      $list = dbscripts_tables_with_increment($branch, $filter_option);
      print_r($list);
    } else {
    	print "\nNot a valid search.\n\n";
    }
  }
?>