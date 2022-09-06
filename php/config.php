<?php

// Password for the web.
$password = "test";

// Paths to the config files
// Absolute paths or Relative (starting from ConfigPortal/php/)
//
// For example:
//   "config.conf" would point to "ConfigPortal/php/config.conf"
//   but "../config.conf" would point to "ConfigPortal/config.conf"
$config_paths = ["config.conf", "config2.conf"];


// All program names
$program_names = ["test.py"];

// All program start commands
$start_program_lines = ["python ../test.py"];

// All program stop commands
$stop_program_lines = ["python process_actions.py stop test.py"];

// All program status commands
$program_status_lines = ["python process_actions.py check test.py"];

 ?>
