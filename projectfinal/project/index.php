<?php
require_once 'config/dbconnection.php';
require_once 'routes.php';

$db = (new Database())->getConnection();
$route = $_GET['route'] ?? 'home';

handleRoute($route, $db);
?>
