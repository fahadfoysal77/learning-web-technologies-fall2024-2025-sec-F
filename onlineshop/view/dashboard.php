<?php
session_start();

// Check if the user is logged in, if not, redirect to the login page
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Include database connection file
include('model/database.php');

// Fetch employees from the database
$sql = "SELECT * FROM employers";
$result = $conn->query($sql);
$employees = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Employee Dashboard</h2>

    <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>

    <!-- Search Employees -->
    <form method="GET" action="index.php?action=search">
        <input type="text" name="search" placeholder="Search Employees" required>
        <button type="submit">Search</button>
    </form>

    <!-- Display Employees List -->
    <h3>Employees List</h3>
    <table border="1">
        <tr>
            <th>Employee Name</th>
            <th>Contact Number</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee['employerName']; ?></td>
                    <td><?php echo $employee['contactNo']; ?></td>
                    <td><?php echo $employee['username']; ?></td>
                    <td>
                        <a href="index.php?action=updateEmployee&id=<?php echo $employee['id']; ?>">Edit</a> | 
                        <a href="index.php?action=deleteEmployee&id=<?php echo $employee['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No employees found.</td>
            </tr>
        <?php endif; ?>
    </table>

    <p><a href="logout.php">Logout</a></p>

</body>
</html>
