#!/usr/bin/env php
<?php
  require('dbscripts.module');
  $options = $_SERVER['argv'];

  if ($options[1] == 'all') {
    print dbscripts_raise_all_increments();
  } else {
    $table = $options[1];
    $column = $options[2];
    $start_at = $options[3];
    $change_to = $options[4];
    $branch = $options[5];
    $filter_option = $options[6];

    print dbscripts_raise_table_increments($table, $column, $start_at, $change_to, $branch, $filter_option);
  }
?>