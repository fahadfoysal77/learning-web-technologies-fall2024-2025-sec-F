<head>

    <title>Admin Employer Form</title>
    <link rel="stylesheet" href="../assets/style.css">
    <script src="../assets/script.js" defer></script>
</head>
<body>
<form id="adminForm" method="POST" action="index.php">
    <label for="action">Choose action:</label>
    <select name="action" id="action" required>
        <option value="register">Register</option>
        <option value="update">Update</option>
        <option value="delete">Delete</option>
        <option value="search">Search</option>
    </select>

    <div id="registerFields" class="formFields">
        <h3>Register Employer</h3>
        <input type="text" name="employerName" id="employerName" placeholder="Employer Name" required>
        <input type="text" name="contactNo" id="contactNo" placeholder="Contact No" required>
        <input type="text" name="username" id="username" placeholder="Username" required>
        <input type="password" name="password" id="password" placeholder="Password" required>
    </div>

    <div id="updateFields" class="formFields" style="display: none;">
        <h3>Update Employer</h3>
        <input type="text" name="username" id="usernameUpdate" placeholder="Username" required>
        <input type="text" name="employerName" id="employerNameUpdate" placeholder="Employer Name" required>
        <input type="text" name="contactNo" id="contactNoUpdate" placeholder="Contact No" required>
    </div>

    <div id="deleteFields" class="formFields" style="display: none;">
        <h3>Delete Employer</h3>
        <input type="text" name="username" id="usernameDelete" placeholder="Username" required>
    </div>

    <div id="searchFields" class="formFields" style="display: none;">
        <h3>Search Employer</h3>
        <input type="text" name="username" id="usernameSearch" placeholder="Username" required>
        <div id="searchResult"></div>
    </div>

    <button type="submit">Submit</button>
</form>
</body>
</html>