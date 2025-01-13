<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
</head>
<body>
    <h2>Update Employee</h2>

    <form method="POST">
        <label for="name">Employee Name:</label>
        <input type="text" name="name" value="<?php echo $employee['name']; ?>" required><br>

        <label for="contact_no">Contact Number:</label>
        <input type="text" name="contact_no" value="<?php echo $employee['contact_no']; ?>" required><br>

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?php echo $employee['username']; ?>" required><br>

        <button type="submit">Update</button>
    </form>

</body>
</html>
