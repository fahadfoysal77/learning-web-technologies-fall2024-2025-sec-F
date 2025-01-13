<?php
include('connection.php');
include('models/EmployerModel.php');

$model = new EmployerModel();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $result = $model->searchEmployer($username);
    echo $result;
}
?>
