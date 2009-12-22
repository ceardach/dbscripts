#!/usr/bin/env php
<?php
  require('dbscripts.module');
  if (in_array('help', $_SERVER['argv'])) {
    print dbscripts_help('erase');
  } else {
<<<<<<< HEAD
    print dbscripts_erase($_SERVER['argv']);
=======
    $_SERVER['argv'][1] = isset($_SERVER['argv'][1]) ? $_SERVER['argv'][1] : 'full';
    print dbscripts_erase($_SERVER['argv'][1]);
>>>>>>> d139379bd57d6e5a141ab1d37c958696ed104078
  }
?>
