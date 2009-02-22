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
      $list = dbscripts_find_tables_with_increment($branch, $filter_option);
      print_r($list);

    } elseif (isset($options[1]) && $options[1] == 'references') {
      $branch = isset($options[3]) ? $options[3] : 'development';
      $filter_option = isset($options[4]) ? $options[4] : 'full';

      print "\n Please wait. This can take awhile.  'ctrl+c' to cancel.\n\n";

      $list = array();
    	if(isset($options[2]) && $options[2] != 'all') {
        $table = $options[2];
        $list = dbscripts_find_possible_table_references($table, $branch, $filter_option);
    	} else {
        $table_list = dbscripts_find_tables_with_increment($branch, $filter_option);
        foreach ($table_list as $table) {
        	$references = dbscripts_find_possible_table_references($table, $branch, $filter_option);
          if ($references) {
          	$list[$table] = $references;
          }
        }
    	}
      print_r($list);

    } else {
    	print "\nNot a valid search.\n\n";
    }
  }
?>