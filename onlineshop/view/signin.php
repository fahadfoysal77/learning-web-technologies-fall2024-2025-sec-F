<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
</head>
<body>
    <h2>Sign In</h2>
    <form method="POST" action="login.php">
        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <!-- Submit Button -->
        <button type="submit">Sign In</button>
    </form>

    <!-- Link to Sign Up page -->
    <p>Don't have an account? <a href="register.php">Sign Up</a></p>
    

</body>
</html>
