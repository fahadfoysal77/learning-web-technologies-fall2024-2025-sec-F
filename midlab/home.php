<?php
session_start();
?>

<head>
    <meta charset="">
    <meta name="" content="">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to Our Website</h1>
    
    <?php if (isset($_SESSION['username'])): ?>
        <p>Hello, <?php echo $_SESSION['username']; ?>! You are logged in.</p>
        <p><a href="logout.php">Logout</a></p>
        <p><a href="dashboard.php">Go to Dashboard</a></p>
    <?php else: ?>
        <p><a href="login.php">Login</a> | <a href="registration.php">Register</a></p>
    <?php endif; ?>

</body>
</html>
