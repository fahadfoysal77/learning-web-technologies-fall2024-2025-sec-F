<?php
session_start();

$errorMessage = '';
$username = $password = $confirmPassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    
    if ($password != $confirmPassword) 
    {
        $errorMessage = "Passwords do not match!";
    } 
    else 
    {
        $_SESSION['username'] = $username;
        header("Location: login.php");
        exit();
    }
}
?>

<head>
    <meta charset="">
    <meta name="" content="">
    <title>Registration Page</title>
</head>
<body>
    <h1>Register</h1>
    
    <?php if ($errorMessage != ''): ?>
        <div style="color: red;"><?= $errorMessage ?></div>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirmPassword" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Register"></td>
            </tr>
        </table>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>
