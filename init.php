<?php
define('ROOT_PATH', dirname(__FILE__));
define('CONF_PATH', ROOT_PATH.'/config');
define('DB_PATH', ROOT_PATH.'/database');
define('LIB_PATH', ROOT_PATH.'/libraries');
define('APP_PATH', ROOT_PATH.'/application');

include CONF_PATH.'/functions.php';
include CONF_PATH.'/database.php';

fSession::open();

include CONF_PATH.'/route.php';
