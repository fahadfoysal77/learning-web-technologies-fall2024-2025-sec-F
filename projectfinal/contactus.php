<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form processing
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $message = htmlspecialchars(trim($_POST['message']));

        // Validation
        if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // Insert data into the database
            $stmt = $conn->prepare("INSERT INTO contactsupport (name, email, message) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $name, $email, $message);

            if ($stmt->execute()) {
                $success_message = "Thank you for contacting us! Your message has been sent.";
            } else {
                $error_message = "Error: Could not send your message. Please try again.";
            }
            $stmt->close();
        } else {
            $error_message = "Please fill in all fields with valid information.";
        }
    }
}

$conn->close();
?>

<head>

    <title>Contact and Support</title>
    
</head>
<body>
    <!-- Outer Border -->
    <table border="1" width="100%" cellpadding="10">
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
                <h2 align="center">Contact and Support</h2>

                <!-- Contact Us and FAQs Section -->
                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                            <!-- Contact Us Form -->
                            <fieldset>
                                <legend>Contact Us</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Your Name:</td>
                                            <td><input type="text" name="name" required></td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td><input type="email" name="email" required></td>
                                        </tr>
                                        <tr>
                                            <td>Message:</td>
                                            <td><textarea name="message" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit" value="Submit">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                if (isset($success_message)) {
                                    echo "<p style='color:green; text-align:center;'>$success_message</p>";
                                } elseif (isset($error_message)) {
                                    echo "<p style='color:red; text-align:center;'>$error_message</p>";
                                }
                                ?>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <!-- FAQs Section -->
                            <fieldset>
                                <legend>FAQs</legend>
                                <div>
                                    <details>
                                        <summary><strong>Q:</strong> How can I publish a job notice?</summary>
                                        <p><strong>A:</strong> Use the "Job Notice Publish" form in the dashboard.</p>
                                    </details>
                                    <details>
                                        <summary><strong>Q:</strong> How do I upload an admit card?</summary>
                                        <p><strong>A:</strong> Use the "Admit Card Upload" section under the Admit Card and Result page.</p>
                                    </details>
                                    <details>
                                        <summary><strong>Q:</strong> Whom should I contact for support?</summary>
                                        <p><strong>A:</strong> Use the "Contact Us" form above to reach out to our team.</p>
                                    </details>
                                </div>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
