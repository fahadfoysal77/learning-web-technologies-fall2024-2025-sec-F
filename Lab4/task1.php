
<html>

<head>

    <title>Name</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Name</legend>

                    <form method="POST" action="">
                        <input type="text" name="name" id="name" placeholder="Enter your name" required>
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
if (isset($_POST['submit_name'])) 
{
    $name = $_POST['name'];
    if (empty($name)) 
    {
        echo "Name cannot be empty.<br>";
    } 
    elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\- ]*$/", $name) || str_word_count($name) < 2) 
    {
        echo "Name must start with a letter, contain at least two words, and can only include letters, periods, and dashes.<br>";
    } else 
    {
        echo "Name is valid.<br>";
    }
}
?>