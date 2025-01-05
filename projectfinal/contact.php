<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'contact') {
    $name = $_POST['name'] ?? 'Unknown';
    $email = $_POST['email'] ?? 'No email provided';
    $message = $_POST['message'] ?? 'No message provided';
    echo "Message received from $name ($email): $message";
} else {
    echo "No valid data received.";
}
?>
