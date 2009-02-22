#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('find');
  } else {
    $options = $_SERVER['argv'];

    // Find all tables with auto_increment
    if (isset($options[1]) && $options[1] == 'increment') {
      $branch = isset($options[2]) ? $options[2] : 'development';
      $filter_option = isset($options[3]) ? $options[3] : 'full';
      $list = dbscripts_find_tables_with_increment($branch, $filter_option);
      print_r($list);

    // Find all possible references to a given table
    } elseif (isset($options[1]) && $options[1] == 'possible-references') {
      print "\n Please wait. This can take awhile.  'ctrl+c' to cancel.\n\n";

      $branch = isset($options[3]) ? $options[3] : 'development';
      $filter_option = isset($options[4]) ? $options[4] : 'full';

      $list = array();
    	if(isset($options[2]) && $options[2] != 'all') {
        $table = $options[2];
        $list = dbscripts_find_possible_table_references($table, $branch, $filter_option);
    	} else {
        $table_list = dbscripts_find_tables_with_increment($branch, $filter_option);
        if (is_array($table_list)) {
          foreach ($table_list as $table) {
          	$references = dbscripts_find_possible_table_references($table, $branch, $filter_option);
            if (is_array($references)) {
            	$list[$table] = $references;
            }
          }
        } else {
          // If not an array, pass through the error message
        	print "\n$table_list\n\n";
        }
    	}
      print_r($list);

    // Find all configured and possible references to a given table
    } elseif (isset($options[1]) && $options[1] == 'references') {
      if(isset($options[2])) {
        $table = $options[2];
        $branch = isset($options[3]) ? $options[3] : 'development';
        $filter_option = isset($options[4]) ? $options[4] : 'full';
        $references = dbscripts_get_table_references($table, $branch, $filter_option);
        print_r($references);
      } else {
      	print "\nMust provide a table to check.\n\n";
      }

    // Fail
    } else {
    	print "\nNot a valid search.\n\n";
    }
  }
?>