<?php
/**
 * User: whh935
 * Date: 2018/4/14 18:25
 * Desc: 剑指offer面试题3
 *      在一个从左到右递增，从上到下递增的二维数组矩阵中查找一个数，存在返回true，否则false
 */

/**
 * 查找函数
 * @param $arr
 * @param $number
 * @return bool
 */
function find_number($arr, $number)
{
    if (!is_array($arr)) {
        return false;
    }

    $rows       = count($arr);
    $columns    = count($arr[0]);

    $found  = false;
    $row    = 0;
    $column = $columns - 1;
    if ($rows > 0 && $columns > 0) {
        while ($row < $rows && $column >= 0) {
            if ($arr[$row][$column] == $number) {
                $found = true;
                break;
            } elseif ($arr[$row][$column] > $number) {
                $column--;
            } else {
                $row++;
            }
        }
    }

    return $found;
}

$test = [
    [1,2,8,9],
    [2,4,9,12],
    [4,7,10,13],
    [6,8,11,15]
];

var_dump(find_number($test, 7));
var_dump(find_number($test, 23));
exit;
