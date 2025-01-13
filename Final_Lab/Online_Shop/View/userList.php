<?php
session_start();
require_once('../Model/userModel.php'); // Include the file with the getConnection() function

if (isset($_COOKIE['flag'])) {
    ?>
    <html lang="en">
    <head>
        <title>User List</title>
        <link rel="stylesheet" type="text/css" href="../assets/css/userList.css">
    </head>
    <body>
    <h2>User List</h2>
    <a href="welcome.php">Back</a> |
    <!-- <a href="logout.php">Logout</a> -->

    <table border=1>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Username</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        // Loop through the data fetched from the database
        $employees = getAllUser();
        foreach ($employees as $employee) {
            ?>
            <tr>
                <td><?php echo $employee['id']; ?></td>
                <td><?php echo $employee['name']; ?></td>
                <td><?php echo $employee['phone']; ?></td>
                <td><?php echo $employee['user_name']; ?></td>
                <td><?php echo $employee['password']; ?></td>
                <td>
                    <a href='updateUser.php?id=<?=$employee['user']?>'>EDIT</a> |
                    <a href='deleteUser.php?id=<?=$employee['id']?>'>DELETE</a>

                </td>
            </tr>
        <?php } ?>
    </table>
    </body>
    </html>

    <?php
} else {
    header('location: login.html');
}
?>


