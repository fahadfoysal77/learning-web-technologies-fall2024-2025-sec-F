<?php include 'dbconnection.php'; ?>

<head>
    <title>Sign Up</title>
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
                <h2 align="center">Sign Up</h2>

                <!-- Form Section -->
                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                            <form method="POST" action="">
                                <table align="center" cellpadding="10" width="100%">
                                    <tr>
                                        <td>Name:</td>
                                        <td><input type="text" name="name" required></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><input type="email" name="email" required></td>
                                    </tr>
                                    <tr>
                                        <td>Password:</td>
                                        <td><input type="password" name="password" required></td>
                                    </tr>
                                    <tr>
                                        <td>Role:</td>
                                        <td>
                                            <select name="role" required>
                                                <option value="job_publisher">Job Publisher</option>
                                                <option value="user">User</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <input type="submit" name="signup" value="Sign Up">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </td>
                    </tr>
                </table>

                <!-- Sign In Link -->
                <p align="center">Already have an account? <a href="signin.php">Sign In</a></p>

                <?php
                if (isset($_POST['signup'])) {
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
                    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $role = $_POST['role'];

                    // Check if email already exists
                    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
                    $stmt->bind_param("s", $email);
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows > 0) {
                        echo "<p align='center' style='color:red;'>Email already exists! Please use a different email.</p>";
                    } else {
                        // Proceed with the insert
                        $stmt = $conn->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
                        $stmt->bind_param("ssss", $name, $email, $password, $role);

                        if ($stmt->execute()) {
                            echo "<p align='center' style='color:green;'>Sign Up successful! <a href='signin.php'>Sign In</a></p>";
                        } else {
                            echo "<p align='center' style='color:red;'>Error: " . $stmt->error . "</p>";
                        }
                    }
                    $stmt->close();
                }
                ?>
            </td>
        </tr>
    </table>
</body>
</html>
