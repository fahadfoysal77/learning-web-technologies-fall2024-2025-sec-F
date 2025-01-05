<?php include 'dbconnection.php'; ?>

<head>
    <title>Forgot Password</title>
</head>
<body>
    <!-- Outer Border -->
    <table border="1" width="80%" cellpadding="10">
        <tr>
            <td>
                <!-- Header Section -->
                <table border="1" width="100%">
                    <tr>
                        <td colspan="2" align="left">
                            <strong>Job Publisher</strong>
                        </td>
                        <td align="right">
                            <strong>User</strong>
                        </td>
                    </tr>
                </table>

                <!-- Title -->
                <h2 align="center">Forgot Password</h2>

                <!-- Form Section -->
                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                        <form method="POST" action="">
    <table align="center" cellpadding="10" width="100%">
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" required></td>
        </tr>
        <tr>
            <td>New Password:</td>
            <td><input type="password" name="new_password" required></td>
        </tr>
        <tr>
            <td>Confirm Password:</td>
            <td><input type="password" name="confirm_password" required></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="reset_password" value="Reset Password">
            </td>
        </tr>
    </table>
</form>

                        </td>
                    </tr>
                </table>

                <!-- Sign In Link -->
                <p align="center">Remember your password? <a href="signin.php">Sign In</a></p>

                <?php
if (isset($_POST['reset_password'])) {
    $email = trim($_POST['email']);
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Check if passwords match
    if ($newPassword === $confirmPassword) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update the user's password in the database
        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);

        if ($stmt->execute() && $stmt->affected_rows > 0) {
            echo "<p align='center' style='color:green;'>Password reset successful!</p>";
        } else {
            echo "<p align='center' style='color:red;'>Error: Email not found or update failed!</p>";
        }
        $stmt->close();
    } else {
        echo "<p align='center' style='color:red;'>Passwords do not match. Please try again.</p>";
    }
}
?>

            </td>
        </tr>
    </table>
</body>
</html>
