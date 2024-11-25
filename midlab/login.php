<?php
session_start();

$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  
    $storedUsername = "";
    $storedPassword = ""; 

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == $storedUsername && $password == $storedPassword) 
    {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } 
    else 
    {
        $errorMessage = "Invalid username or password.";
    }
}
?>


<head>
    <meta charset="-">
    <meta name="" content="">
    <title>Login Page</title>
</head>
<body>
    <h1>Login</h1>
    
    <?php if ($errorMessage != ''): ?>
        <div style="color: red;"><?= $errorMessage ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
    
    <p>Don't have an account? <a href="registration.php">Register</a></p>
</body>
</html>
