<?php
session_start();
require_once('../Model/userModel.php'); // Include the file with the getConnection() function

if (isset($_COOKIE['flag'])) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Search User</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/searchUser.css">
    </head>
    <body>
    <h1>Search for Users</h1>
    <form username="searchForm" method="POST" action="">
        <input type="text" name="username" id="username" placeholder="Enter username" required>
        <button type="submit" name="search">Search</button>
    </form>

    <div id="results">
        <?php
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['search'])) {
            $username = $_POST['username'];
            $users = searchUser($username); // Call the function from userModel.php

            if (count($users) > 0) {

                echo "<tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>user_name</th>
                        <th>password</th>
                      </tr>";
                foreach ($users as $user) {
                    echo "<tr>
                            <td>" . htmlspecialchars($user['id']) . "</td>
                            <td>" . htmlspecialchars($user['name']) . "</td>
                            <td>" . htmlspecialchars($user['phone']) . "</td>
                            <td>" . htmlspecialchars($user['user_name']) . "</td>
                            <td>" . htmlspecialchars($user['password']) . "</td>
                          </tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No users found matching the query.</p>";
            }
        }
        ?>
    </div>
    </body>
    </html>

    <?php
} else {
    header('location: login.html');
}
?>
