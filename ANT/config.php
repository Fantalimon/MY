<?php
$config = parse_ini_file('config.ini', true);

// define site domain
define('SITE', $config['domain']);
// page in list
define('PAGEINLIST', $config['pageinlist']);
define('BASE_PATH', realpath(__DIR__));

// define DB configuration
$configDb = $config['db'];
define('DB_HOST', $configDb['host']);
define('DB_USER', $configDb['user']);
define('DB_PASSWORD', $configDb['password']);
define('DB_NAME', $configDb['dbname']);
define('DB_PORT', $configDb['port']);

