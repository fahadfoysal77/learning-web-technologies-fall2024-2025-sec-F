
<html>

<head>

    <title>Email</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Email</legend>

                    <form method="POST" action="task2.php">
                        <input type="email" name="email" id="email" placeholder="Enter your email" required>
                        <br>
                        <br>
                        <button type="submit" name="submit_name">Submit</button>
                </fieldset>
               
                
                </form>
            </td>
        </tr>
    </table>
</body>

</html>

<?php
if (isset($_POST['submit_email'])) 
{
    $email = $_POST['email'];
    if (empty($email)) 
    {
        echo "Email cannot be empty.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
    {
        echo "Invalid email address.<br>";
    } else 
    {
        echo "Email is valid.<br>";
    }
}
?>
