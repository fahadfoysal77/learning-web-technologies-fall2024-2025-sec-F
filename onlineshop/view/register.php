<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>
    <form method="POST" action="register.php" id="signupForm">
        <!-- Employee Name -->
        <label for="name">Employee Name:</label>
        <input type="text" name="name" id="name" required><br>

        <!-- Contact Number -->
        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" id="contact_no" required><br>

        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <!-- Submit Button -->
        <button type="submit">Register</button>
    </form>
    <p align="center">Already have an account? <a href="signin.php">Sign In</a></p>

    <!-- Validation Error Messages (to be displayed if form is invalid) -->
    <div id="errorMessages" style="color: red;"></div>

    <script src="scripts.js"></script>
</body>
</html>
