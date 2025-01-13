<?php
session_start();
require_once('../Model/userModel.php'); // Include the file with the deleteUser() function

if (isset($_COOKIE['flag'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Call the deleteUser function to delete the user from the database
        if (deleteUser($id)) {
            echo "User deleted successfully!";
            header("Location: userlist.php"); // Redirect to the user list page
            exit;
        } else {
            echo "Failed to delete user.";
        }
    } else {
        echo "No user ID provided!";
    }
} else {
    header('location: login.html');
    exit;
}
?>
