<?php
$arr = [1, 2, 3, 4, 5];
$search = 6;
$found = false;

foreach ($arr as $element) 
{
    if ($element == $search) 
    {
        $found = true;
        break;
    }
}

if ($found) 
{
    echo "$search is found in the array.\n";
} 
else 
{
    echo "$search is not found in the array.\n";
}

?>
