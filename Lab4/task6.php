
<html>

<head>

    <title>Blood Group</title>
</head>

<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Blood Group</legend>

                    <form method="POST" action="task2.php">
                        < <select name="">
                        <option value="A"> A+</option>
                        <option value="O"> O+</option>
                        <option value="AB"> AB+</option>
                        <option value="B"> B+</option>
                        <option value="A"> A-</option>
                        <option value="O"> O-</option>
                        <option value="AB"> AB-</option>
                        <option value="B"> B-</option>
                    </select>
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
if (isset($_POST['submit_bloodGroup'])) 
{
    $bloodGroup = $_POST['bloodGroup'];
    if (empty($bloodGroup)) 
    {
        echo "Please select a blood group.<br>";
    } else 
    {
        echo "Blood group is selected.<br>";
    }
}
?>


