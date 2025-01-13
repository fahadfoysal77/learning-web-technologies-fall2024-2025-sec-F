<?php
// Include necessary files
include('model/database.php');
include('controller/EmployeeController.php');

// Create DB connection
$db = new mysqli("localhost", "root", "", "onlineshop");

// Check if DB connection is successful
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$controller = new EmployeeController($db);

// Handle actions based on the URL parameters
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->login($_POST['username'], $_POST['password']);
    }

    elseif ($action === 'search' && $_SERVER['REQUEST_METHOD'] === 'GET') {
        $controller->searchEmployees($_GET['search']);
    }
    
    elseif ($action === 'updateEmployee') {
        // Logic to handle update action
    }

    elseif ($action === 'deleteEmployee') {
        // Logic to handle delete action
    }
    
} else {
    // Default action to show employees
    $controller->showEmployees();
}
?>
