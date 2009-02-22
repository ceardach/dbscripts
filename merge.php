#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('merge');
  } else {

    // Findout if the user wants to continue from a previous merge
    $continue = FALSE;
    if (in_array('continue', $_SERVER['argv'])) {
      $continue = TRUE;
    }

    // Reset the array by removing the other set variables
    foreach ($_SERVER['argv'] as $key => $variable) {
      if ($variable = 'continue') unset($_SERVER['argv'][$key]);
    }
    foreach ($_SERVER['argv'] as $variable) {
      $_SERVER['argv'][] = $variable;
    }

    $dev_db = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : FALSE;
    $lastmerge_db = isset($_SERVER['argv'][2]) ? $_SERVER['argv'][2] : FALSE;
    $prod_db = isset($_SERVER['argv'][3]) ? $_SERVER['argv'][3] : FALSE;

    print dbscripts_merge($dev_db, $lastmerge_db, $prod_db, $continue);

  }
?>
