<?php
require_once 'app/core/Controller.php';
require_once 'app/core/Model.php';
require_once 'app/core/Database.php';

require_once 'app/models/AuthModel.php';
require_once 'app/models/EmployeeModel.php';
require_once 'app/controllers/AuthController.php';
require_once 'app/controllers/EmployeeController.php';

define('URLROOT', 'http://localhost/online-shop-management');

// Basic routing logic
if ($_SERVER['REQUEST_URI'] == '/login') {
    $controller = new AuthController();
    $controller->login();
} elseif ($_SERVER['REQUEST_URI'] == '/register') {
    $controller = new AuthController();
    $controller->register();
} else {
    $controller = new EmployeeController();
    $controller->index();
}
?>
