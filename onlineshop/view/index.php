<?php
include('../model/database.php'); // Make sure this line is included at the top

// Check if the action is set in the POST request
if (isset($_POST['action'])) {
    // Get action type from the form
    $action = $_POST['action'];

    // Register Action
    if ($action === 'register') {
        if (isset($_POST['employerName'], $_POST['contactNo'], $_POST['username'], $_POST['password'])) {
            $employerName = $_POST['employerName'];
            $contactNo = $_POST['contactNo'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "INSERT INTO employers (employerName, contactNo, username, password) 
                    VALUES ('$employerName', '$contactNo', '$username', '$password')";

            if ($conn->query($sql) === TRUE) {
                echo "New employer registered successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Please fill all required fields.";
        }
    }

    // Update Action
    elseif ($action === 'update') {
        if (isset($_POST['username'], $_POST['employerName'], $_POST['companyName'], $_POST['contactNo'])) {
            $username = $_POST['username'];
            $employerName = $_POST['employerName'];
            $contactNo = $_POST['contactNo'];

            $sql = "UPDATE employers SET employerName='$employerName', contactNo='$contactNo' WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                echo "Employer updated successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Please provide the necessary details for update.";
        }
    }

    // Delete Action
    elseif ($action === 'delete') {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];

            $sql = "DELETE FROM employers WHERE username='$username'";

            if ($conn->query($sql) === TRUE) {
                echo "Employer deleted successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Please provide the username to delete.";
        }
    }

    // Search Action
    elseif ($action === 'search') {
        if (isset($_POST['username'])) {
            $username = $_POST['username'];

            $sql = "SELECT * FROM employers WHERE username='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "Employer Name: " . $row['employerName'] . "<br>";
                    echo "Contact No: " . $row['contactNo'] . "<br>";
                    echo "Username: " . $row['username'] . "<br>";
                }
            } else {
                echo "No employer found with the username: $username";
            }
        } else {
            echo "Please provide the username to search.";
        }
    }
}

// Close the connection
$conn->close();
?>
