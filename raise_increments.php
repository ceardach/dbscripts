#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('raise_increments');
  } else {
    $options = $_SERVER['argv'];

    if (isset($options[1]) && $options[1] != 'all') {
      if (isset($options[4])) {
        $table = $options[1];
        $start_at = $options[3];
        $change_to = $options[4];
        $branch = $options[5];
        $filter_option = $options[6];

        print dbscripts_raise_table_increments($table, $start_at, $change_to, $branch, $filter_option);
      } else {
        print "\n\nMust provide a table, increment to start at, and increment to change to\n\n";
      }
    } else {
      print dbscripts_raise_all_increments();
    }
  }
?>