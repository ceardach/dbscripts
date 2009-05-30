#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('raise_increments');
  } else {
    $options = $_SERVER['argv'];

    if (isset($options[1]) && $options[1] != 'all') {
      if (isset($options[3])) {
        $table = $options[1];
        $start_at = $options[2];
        $change_to = $options[3];
        $branch = isset($options[4]) ? $options[4] : 'development';
        $filter_option = isset($options[5]) ? $options[5] : 'full';

        print dbscripts_raise_table_increments($table, $start_at, $change_to, $branch, $filter_option);
      } else {
        print "\n\nMust provide a table, increment to start at, and increment to change to\n\n";
      }
    } else {
      print dbscripts_raise_all_increments();
    }
  }
?>