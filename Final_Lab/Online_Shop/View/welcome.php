<?php
session_start();
if(isset($_COOKIE['flag'])){
    ?>

    <html lang="en">
    <head>
        <title>Welcome</title>
        <link rel="stylesheet" type="text/css" href="../Static/css/welcome.css">
    </head>
    <body>
    <h1>Welcome Home! <?php echo $_SESSION['username']?></h1>
    <a href="../View/userlist.php">View All Users</a> </br>
    <a href="../View/searchUser.php">Search Users</a></br>
    <button onclick="location.href='login.html'">Back</button>
    </body>
    </html>

    <?php
}else{
    header('location: login.html');
}
?>
