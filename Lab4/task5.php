<html>
<head>

    <title>Degree</title>
</head>
<body>
    <table>
        <tr>
            <td>
                <fieldset>
                    <legend>Degree</legend>

                    <form method="POST" action="">
                        <input type="checkbox" name="Degree" value="SSC" required> SSC
                        <input type="checkbox" name="Degree" value="HSC" required> HSC
                        <input type="checkbox" name="Degree" value="Bsc" required> Bsc
                        <input type="checkbox" name="Degree" value="Msc" required> Msc
                    
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
if (isset($_POST['submit_degree'])) 
{
    $degree = $_POST['degree'] ?? [];
    if (count($degree) < 2) 
    {
        echo "Please select at least two degrees.<br>";
    } else
    {
        echo "Degree selection is valid.<br>";
    }
}
?>