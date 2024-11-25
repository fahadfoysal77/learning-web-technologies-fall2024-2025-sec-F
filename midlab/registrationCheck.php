<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    $_SESSION['user data'] = ['username' => $username,'password' => $password ];

    echo "<h2>Registration successful !</h2>";
    echo"<p><a href='login.php'>Go to Login </a></p>";
    var dump($ $_SESSION)


}
?>