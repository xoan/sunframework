<?php
$db = array(
	'development' => array(
		'type' => 'sqlite',
		'name' => DB_PATH.'/sqlite.db',
		'user' => '',
		'pass' => '',
		'host' => ''
	),
	'production' => array(
		'type' => '',
		'name' => '',
		'user' => '',
		'pass' => '',
		'host' => ''
	)
);
$database = new fDatabase($db[ENV]['type'], $db[ENV]['name'], $db[ENV]['user'], $db[ENV]['pass'], $db[ENV]['host']);
fORMDatabase::attach($database);
