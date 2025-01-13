<?php
require_once('../Model/userModel.php');
if(isset($_POST['submit'])){
    $name  =  trim($_REQUEST['name']);
    $phone  =  trim($_REQUEST['phone']);
    $username  =  trim($_REQUEST['username']);
    $password  =  trim($_REQUEST['password']);



    if($name == null || empty($phone) || $username == null || empty($password) ){
        echo "Null data found!";
    }
    else {
        $status = addUser($name, $phone, $username, $password);
        if($status){
            header('location: ../View/login.html');
        }else{
            header('location: ../View/registration.html');
        }
    }
}else{
    header('location: ../View/registration.html');
}
?>