<?php
require_once 'models/EmployeeModel.php';

class DashboardController {

    public function index() {
        session_start();

        // Check if user is logged in
        if (!isset($_SESSION['username'])) {
            header("Location: signin.php");
            exit();
        }

        // Show the dashboard view with employee data
        $employeeModel = new EmployeeModel();
        $employees = $employeeModel->getAllEmployees();
        
        include 'views/dashboard.php';
    }

    // Handle employee update
    public function updateEmployee($id) {
        $employeeModel = new EmployeeModel();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $contact_no = $_POST['contact_no'];
            $username = $_POST['username'];

            $employeeModel->updateEmployee($id, $name, $contact_no, $username);
            header("Location: dashboard.php");
        } else {
            $employee = $employeeModel->getEmployeeById($id);
            include 'views/update_employee.php';
        }
    }

    // Handle employee deletion
    public function deleteEmployee($id) {
        $employeeModel = new EmployeeModel();
        $employeeModel->deleteEmployee($id);
        header("Location: dashboard.php");
    }

    // Handle employee search
    public function searchEmployee() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $employeeModel = new EmployeeModel();
            $employees = $employeeModel->searchEmployees($searchTerm);
            include 'views/dashboard.php';
        }
    }
}
?>
