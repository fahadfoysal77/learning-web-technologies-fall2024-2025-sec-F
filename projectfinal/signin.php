<?php include 'dbconnection.php'; ?>

<head>
    <title>Sign In</title>
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
                <h2 align="center">Sign In</h2>

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
                                        <td>Password:</td>
                                        <td><input type="password" name="password" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" name="signin" value="Sign In">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>

                <!-- Sign Up Link -->
                <p align="center">Don't have an account? <a href="signup.php">Sign Up</a></p>

                <!-- Forgot Password Link -->
                <p align="center"><a href="forgotpassword.php">Forgot Password?</a></p>

                <?php
                if (isset($_POST['signin'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows === 1) {
                        $user = $result->fetch_assoc();
                        if (password_verify($password, $user['password'])) {
                            echo "<p align='center' style='color:green;'>Sign In successful!</p>";
                            // Redirect to dashboard or another page
                        } else {
                            echo "<p align='center' style='color:red;'>Invalid password!</p>";
                        }
                    } else {
                        echo "<p align='center' style='color:red;'>User not found!</p>";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>
