<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
header('Content-type: application/json');

define('host', 'localhost');
define('database', 'med');
define('user', 'root');
define('pswd', '');

$mysqli = new mysqli(host , user , pswd , database);









?>