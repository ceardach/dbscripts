#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('find');
  } else {
    $options = $_SERVER['argv'];
    if (isset($options[1]) && $options[1] == 'increment') {
      if (isset($options[2])) {
        $filter_option = isset($options[3]) ? $options[3] : 'full';
        print dbscripts_tables_with_increment($options[2],$filter_option);
      } else {
      	print "\nMust provide a branch.\n\n";
      }
    } else {
    	print "\nNot a valid search.\n\n";
    }
  }
?>