<?php
require_once 'Database.php'; // Assuming you have this file for DB connection
require_once 'EmployeeModel.php'; // Assuming you have this for the Employee logic

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input fields (you can also add JavaScript validation for frontend)
    if (empty($name) || empty($contact_no) || empty($username) || empty($password)) {
        echo "All fields are required!";
    } else {
        // Create an instance of the EmployeeModel
        $employeeModel = new EmployeeModel();

        // Add the new employee to the database
        if ($employeeModel->addEmployee($name, $contact_no, $username, $password)) {
            echo "Employee registered successfully!";
        } else {
            echo "Error registering the employee.";
        }
    }
}
?>
