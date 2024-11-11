<?php
$num1 = 20;
$num2 = 60;
$num3 = 55;

if ($num1 >= $num2 && $num1 >= $num3) 
{
    echo "Largest number is: $num1\n";
} 
elseif ($num2 >= $num1 && $num2 >= $num3) 
{
    echo "Largest number is: $num2\n";
} 
else 
{
    echo "Largest number is: $num3\n";
}

?>
