<html>
<head>

    <title>Date of birth</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Date of birth</legend>

                    <form method="POST" action="">
                        <input type="date" name="" id="" placeholder="" required>
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
if (isset($_POST['submit_dob'])) 
{
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    if (empty($day) || empty($month) || empty($year)) 
    {
        echo "Date of Birth cannot be empty.<br>";
    } 
    elseif ($day < 1 || $day > 31 || $month < 1 || $month > 12 || $year < 1953 || $year > 1998) 
    {
        echo "Invalid Date of Birth.<br>";
    } else 
    {
        echo "Date of Birth is valid.<br>";
    }
}
?>