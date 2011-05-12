<?php
define('ENV', file_exists('DEVELOPMENT') ? 'development' : 'production');
define('PUB_PATH', dirname(__FILE__));

switch (ENV) {
	case 'development':
	case 'production':
	default:
		include '../init.php';
}
