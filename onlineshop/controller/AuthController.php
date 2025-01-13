<?php
class AuthController extends Controller {

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->model->login($username, $password);

            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['role'] = $user['role'];
                header('Location: ' . URLROOT . '/dashboard');
            } else {
                echo "Invalid credentials!";
            }
        } else {
            $this->view('login');
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            if ($this->model->register($username, $password, $role)) {
                header('Location: ' . URLROOT . '/login');
            } else {
                echo "Registration failed!";
            }
        } else {
            $this->view('register');
        }
    }
}
?>
