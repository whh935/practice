<?php
/**
 * User: whh935
 * Date: 2018/4/14 18:25
 * Desc: 剑指offer面试题3
 *      在一个从左到右递增，从上到下递增的二维数组矩阵中查找一个数，存在返回true，否则false
 */

/**
 * @param $matrix
 * @param $target
 * @return bool
 */
function findNumberIn2DArray($matrix, $target)
{
    if (!is_array($matrix)) {
        return false;
    }

    $rows    = count($matrix);
    $columns = count($matrix[0]);
    if ($rows == 0 || $columns == 0) {
        return false;
    }

    $found  = false;
    $row    = 0;
    $column = $columns - 1;
    while ($row < $rows && $column >= 0) {
        if ($matrix[$row][$column] == $target) {
            $found = true;
            break;
        } elseif ($matrix[$row][$column] > $target) {
            $column--;
        } else {
            $row++;
        }
    }

    return $found;
}

$test = [
    [1,2,8,9  ],
    [2,4,9,12 ],
    [4,7,10,13],
    [6,8,11,15]
];

var_dump(findNumberIn2DArray($test, 7));
var_dump(findNumberIn2DArray($test, 23));
exit;
