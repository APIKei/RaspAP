<?php

require '../../includes/csrf.php';
require_once '../../includes/config.php';
require_once '../../includes/functions.php';

exec("sudo ddclient -daemon=0 -debug -verbose -noquiet", $return);
echo json_encode($return);

