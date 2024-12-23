<?php

// Database connection function
function getConnection(){
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}

// Login function with secure query and prepared statement
function login($username, $password){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);
    
    // Execute and get result
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $count = mysqli_num_rows($result);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    return $count == 1;
}

// Add user function with prepared statement and validation
function addUser($username, $password, $email){
    $con = getConnection();
    
    // Check if user already exists
    $checkSql = "SELECT * FROM users WHERE username = ?";
    $stmtCheck = mysqli_prepare($con, $checkSql);
    mysqli_stmt_bind_param($stmtCheck, 's', $username);
    mysqli_stmt_execute($stmtCheck);
    $resultCheck = mysqli_stmt_get_result($stmtCheck);
    
    if (mysqli_num_rows($resultCheck) > 0) {
        mysqli_stmt_close($stmtCheck);
        mysqli_close($con);
        return false;  // User already exists
    }
    
    // Insert new user
    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'sss', $username, $password, $email);
    
    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        return true;  // User added successfully
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($con);
        return false;  // Failed to add user
    }
}

// Get user by ID function
function getUser($id){
    $con = getConnection();
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    // Execute and get result
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    return $user;
}

// Get all users function
function getAllUsers(){
    $con = getConnection();
    $sql = "SELECT * FROM users";
    $result = mysqli_query($con, $sql);
    
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
    
    mysqli_close($con);
    return $users;
}

// Update user function with prepared statement
function updateUser($id, $username, $password, $email){
    $con = getConnection();
    
    // Update user details
    $sql = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'sssi', $username, $password, $email, $id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    return $result;  // True if updated successfully, False if failed
}

// Delete user function
function deleteUser($id){
    $con = getConnection();
    
    // Delete user by ID
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    
    // Bind parameters
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    $result = mysqli_stmt_execute($stmt);
    
    mysqli_stmt_close($stmt);
    mysqli_close($con);
    
    return $result;  // True if deleted successfully, False if failed
}
?>
