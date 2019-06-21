<?php
function show($arr)
{
    $length = count($arr);
    for ($i = 0; $i < $length; $i++) {
        echo $arr[$i] . ' ';
    }
    echo "\n";
}

function bubbleSort(&$arr)
{
    $length = count($arr);
    for ($i = 0; $i < $length; $i++) {
        for ($j = 0; $j < $length - $i - 1; $j++) {
            if ($arr[$j] > $arr[$j + 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $tmp;
            }
        }
    }
}

$arr = [15,77,23,43,90,87,68,32,11,22];
show($arr);

bubbleSort($arr);
show($arr);

exit;
