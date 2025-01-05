<?php
include_once 'models/User.php';

class AuthController {
    private $userModel;

    public function __construct($db) {
        $this->userModel = new User($db);
    }

    public function signUp($data) {
        return $this->userModel->registerUser($data['name'], $data['email'], $data['password'], $data['role']);
    }

    public function signIn($data) {
        return $this->userModel->authenticate($data['email'], $data['password']);
    }
}
?>
