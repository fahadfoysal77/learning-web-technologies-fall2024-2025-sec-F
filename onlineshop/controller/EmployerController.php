<?php
class EmployeeController extends Controller {

    public function index() {
        $employees = $this->model->getAllEmployees();
        $this->view('manage_employees', ['employees' => $employees]);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $contact_no = $_POST['contact_no'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($name) || empty($contact_no) || empty($username) || empty($password)) {
                echo "All fields are required!";
            } else {
                $this->model->addEmployee($name, $contact_no, $username, $password);
                header('Location: ' . URLROOT . '/employee');
            }
        }
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $contact_no = $_POST['contact_no'];

            if (empty($name) || empty($contact_no)) {
                echo "All fields are required!";
            } else {
                $this->model->updateEmployee($id, $name, $contact_no);
                header('Location: ' . URLROOT . '/employee');
            }
        }
    }

    public function delete($id) {
        $this->model->deleteEmployee($id);
        header('Location: ' . URLROOT . '/employee');
    }

    public function search() {
        if (isset($_GET['search'])) {
            $searchTerm = $_GET['search'];
            $employees = $this->model->searchEmployee($searchTerm);
            echo json_encode($employees);
        }
    }
}
?>
