<?php
session_start();

if (!isset($_SESSION['username'])) 
{
    header("Location: login.php");
    exit();
}
?>

<head>
    <meta charset="-">
    <meta name="" content="">
    <title>User Dashboard</title>
</head>
<body>
    <h1>Welcome to the Dashboard</h1>
    <p>Hello, <?php echo $_SESSION['username']; ?>! You are logged in.</p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
