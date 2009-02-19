#!/usr/bin/env php
<?php
  require('dbscripts.module');
  $options = $_SERVER['argv'];

  $table = $options[1];
  $column = $options[2];
  $start_at = $options[3];
  $change_to = $options[4];
  $branch = $options[5];
  $filter_option = $options[6];

  print dbscripts_raise_increments($table, $column, $start_at, $change_to, $branch, $filter_option);
?>