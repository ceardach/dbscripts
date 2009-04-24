#!/usr/bin/env php
<?php
  require('dbscripts.module');
  require('config.inc');
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
      $branch = isset($options[3]) ? $options[3] : 'development';
      $filter_option = isset($options[4]) ? $options[4] : 'full';

      $list = array();
    	if(isset($options[2]) && $options[2] != 'all') {
        $table = $options[2];
        $list = dbscripts_find_possible_table_references($table, $branch, $filter_option);
    	} else {
        print "\n Please wait. This can take awhile.  'ctrl+c' to cancel.\n\n";
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
      if(isset($options[2]) && $options[2] != 'all' && $options[2] != 'found') {
        $table =  $options[2];
        $branch = isset($options[3]) && $options[3] != 'found' ? $options[3] : 'development';
        $filter_option = isset($options[4]) && $options[4] != 'found' ? $options[4] : 'full';
        $found_only = in_array('found', $options) ? TRUE : FALSE;
        $references = dbscripts_get_table_references($table, $branch, $filter_option);

        if (!$found_only) {
          print_r($references);
        } else {
          if (isset($references['found'])) {
            print_r($references['found']);
          } else {
            print "\nNo new references found for '$table'.\n\n";
          }
        }
      } else {
        if (file_exists("$dump_path/development/table_list.txt")) {
          print "\n Please wait. This can take awhile.  'ctrl+c' to cancel.\n\n";

          $all_tables = file("$dump_path/development/table_list.txt", FILE_IGNORE_NEW_LINES);
          $tables = _dbscripts_process_tables('development', array_merge($tables_filtered, $tables_filtered_l1, $tables_filtered_l2));
          foreach ($tables as $table) {
            if (in_array('found', $options)) {
              $table_references = dbscripts_get_table_references($table, 'development');
              if (isset($table_references['found'])) $references[$table] = $table_references['found'];
            } else {
              $table_references = dbscripts_get_table_references($table, 'development');
              if (is_array($table_references)) {
                $references[$table] = $table_references;
              }
            }
          }
          if (isset($references)) {
             print_r($references);
          } else {
            print "\nNo new references found.\n\n";
          }
        } else {
          print "\nMust provide a table to check.\n\n";
        }

      }

    // Fail
    } else {
    	print "\nNot a valid search.\n\n";
    }
  }
?>