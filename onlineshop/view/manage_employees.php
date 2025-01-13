<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Employees</title>
</head>
<body>

<h2>Employee Management</h2>
<a href="add_employee.php">Add New Employee</a>
<br>

<input type="text" id="searchInput" placeholder="Search by name" onkeyup="searchEmployee()">
<div id="employeeList">
    <!-- Employee list will be displayed here -->
</div>

<script src="scripts.js"></script>

</body>
</html>
