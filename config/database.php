<?php

$DB_DSN = 'localhost';
$DB_USER = 'root';
$DB_PASSWORD = '123456';
$DB_NAME = 'camagru_mrakhman';

# set DSN - data source name
$dsn = 'mysql:host=' . $DB_DSN . ';dbname=' . $DB_NAME; // . ';charset=gbk'; // charset added to prevent sql injections

# Create a PDO instance
$pdo = new PDO($dsn, $DB_USER, $DB_PASSWORD);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // Disable the emulation mode (change the default)


?>
