<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use src\system\DatabaseConnector;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();

// test code, should output:
// api://default
// when you run $ php bootstrap.php
echo getenv('URL');
$dbConnection = (new DatabaseConnector())->getConnection();
