<?php
session_start();
require_once('userModel.php'); // Include your user model file to use database functions

if (isset($_COOKIE['flag'])) {

    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];

        // Fetch user data from the database
        $con = getConnection();
        $sql = "SELECT * FROM users WHERE id = '{$id}'";
        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result); // Fetch user data
        } else {
            echo "User not found!";
            exit;
        }
    } else {
        echo "No user ID provided!";
        exit;
    }

    // Handle form submission to update user data
    if (isset($_POST['submit'])) {
        $updatedUser = [
            'id' => $id,
            'name' => $_POST['name'],
            'phone' => $_POST['phone'],
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];

        if (updateUser($updatedUser)) {
            echo "User information updated successfully!";
            header("Location: userList.php"); // Redirect to the user list page
            exit;
        } else {
            echo "Failed to update user information!";
        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit User</title>
    </head>
    <body>
    <h2>Edit User Information</h2>
    <form method="post" action="">
        Name: <input type="text" name="name" value="<?= $user['name'] ?>" required /> <br>
        Phone: <input type="text" name="phone" value="<?= $user['phone'] ?>" required /> <br>
        Username: <input type="text" name="username" value="<?= $user['username'] ?>" required /> <br>
        Password: <input type="password" name="password" value="<?= $user['password'] ?>" required /> <br>

        <input type="submit" name="submit" value="Update" />
    </form>
    </body>
    </html>

    <?php
} else {
    header('location: login.html');
    exit;
}
?>
