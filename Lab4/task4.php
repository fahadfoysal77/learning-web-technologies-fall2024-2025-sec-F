<html>
<head>

    <title>Gender</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Gender</legend>

                    <form method="POST" action="">
                        <input type="radio" name="gender" value="Male" required> Male
                        <input type="radio" name="gender" value="Female" required> Female
                        <input type="radio" name="gender" value="Other" required> Other
                    
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
if (isset($_POST['submit_gender'])) 
{
    if (!isset($_POST['gender'])) 
    {
        echo "Please select a gender.<br>";
    } else 
    {
        echo "Gender is selected.<br>";
    }
}
?>