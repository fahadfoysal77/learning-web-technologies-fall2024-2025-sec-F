<?php
// Database Connection
$host = 'localhost';
$db = 'project'; 
$user = 'root'; 
$pass = ''; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Handle Form Submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $notification_type = '';
    $notification_title = '';
    $notification_message = '';
    $recipient_email = null;

    // Determine notification type
    if (isset($_POST['submit_general'])) {
        $notification_type = 'general';
        $notification_title = filter_input(INPUT_POST, 'general_title', FILTER_SANITIZE_STRING);
        $notification_message = filter_input(INPUT_POST, 'general_message', FILTER_SANITIZE_STRING);
    } elseif (isset($_POST['submit_individual'])) {
        $notification_type = 'individual';
        $notification_title = filter_input(INPUT_POST, 'individual_title', FILTER_SANITIZE_STRING);
        $notification_message = filter_input(INPUT_POST, 'individual_message', FILTER_SANITIZE_STRING);
        $recipient_email = filter_input(INPUT_POST, 'recipient_email', FILTER_VALIDATE_EMAIL);
    } elseif (isset($_POST['submit_profile'])) {
        $notification_type = 'profile';
        $notification_title = filter_input(INPUT_POST, 'profile_title', FILTER_SANITIZE_STRING);
        $notification_message = filter_input(INPUT_POST, 'profile_message', FILTER_SANITIZE_STRING);
    }

    // Validate inputs
    if (empty($notification_title) || empty($notification_message) || 
       ($notification_type === 'individual' && empty($recipient_email))) {
        echo "<p style='color:red;'>Error: Please fill in all required fields.</p>";
    } else {
        try {
            // Insert into database
            $sql = "INSERT INTO notifications (type, title, message, recipient_email, created_at) 
                    VALUES (:type, :title, :message, :recipient_email, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':type', $notification_type);
            $stmt->bindParam(':title', $notification_title);
            $stmt->bindParam(':message', $notification_message);
            $stmt->bindParam(':recipient_email', $recipient_email);

            if ($stmt->execute()) {
                echo "<p style='color:green;'>Notification sent successfully!</p>";
            } else {
                echo "<p style='color:red;'>Error: Failed to send notification.</p>";
            }
        } catch (PDOException $e) {
            echo "<p style='color:red;'>Database error: " . $e->getMessage() . "</p>";
        }
    }
}
?>

<head>
   
    <title>Notifications</title>
    
</head>
<body>
    <table border="1" width="100%" cellpadding="10">
        <tr>
            <td>
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
                <h2 align="center">Notifications</h2>
                <table border="1" align="center" cellpadding="10" width="50%">
                    <tr>
                        <td>
                            <fieldset>
                                <legend>General Notifications</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Notification Title:</td>
                                            <td><input type="text" name="general_title" required></td>
                                        </tr>
                                        <tr>
                                            <td>Message:</td>
                                            <td><textarea name="general_message" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit_general" value="Send Notification">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Individual Notifications</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Recipient Email:</td>
                                            <td><input type="email" name="recipient_email" required></td>
                                        </tr>
                                        <tr>
                                            <td>Notification Title:</td>
                                            <td><input type="text" name="individual_title" required></td>
                                        </tr>
                                        <tr>
                                            <td>Message:</td>
                                            <td><textarea name="individual_message" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit_individual" value="Send Notification">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </fieldset>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <fieldset>
                                <legend>Profile Notifications</legend>
                                <form method="POST" action="">
                                    <table align="center" cellpadding="10" width="100%">
                                        <tr>
                                            <td>Notification Title:</td>
                                            <td><input type="text" name="profile_title" required></td>
                                        </tr>
                                        <tr>
                                            <td>Message:</td>
                                            <td><textarea name="profile_message" rows="5" required></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" align="center">
                                                <input type="submit" name="submit_profile" value="Send Notification">
                                                <input type="reset" value="Reset">
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </fieldset>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
