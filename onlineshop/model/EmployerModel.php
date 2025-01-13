<?php
class EmployeeModel {

    private $db;

    public function __construct() {
        // Assuming you have a Database class that handles the DB connection
        $this->db = new Database(); // Database connection
    }

    // Fetch all employees
    public function getAllEmployees() {
        $query = "SELECT * FROM employees";
        return $this->db->query($query);
    }

    // Get a single employee by ID
    public function getEmployeeById($id) {
        $query = "SELECT * FROM employees WHERE id = ?";
        return $this->db->query($query, [$id])[0]; // return the first result
    }

    // Update employee info
    public function updateEmployee($id, $name, $contact_no, $username) {
        $query = "UPDATE employees SET name = ?, contact_no = ?, username = ? WHERE id = ?";
        return $this->db->query($query, [$name, $contact_no, $username, $id]);
    }

    // Delete an employee
    public function deleteEmployee($id) {
        $query = "DELETE FROM employees WHERE id = ?";
        return $this->db->query($query, [$id]);
    }

    // Search employees by name
    public function searchEmployees($searchTerm) {
        $query = "SELECT * FROM employees WHERE name LIKE ?";
        return $this->db->query($query, ['%' . $searchTerm . '%']);
    }
}
?>
