<?php
/**
 * User: whh935
 * Date: 2018/4/14 18:25
 * Desc: 剑指offer面试题04-https://leetcode-cn.com/problems/er-wei-shu-zu-zhong-de-cha-zhao-lcof/
 *      二维数组中的查找
 *      在一个 n * m 的二维数组中，每一行都按照从左到右递增的顺序排序，每一列都按照从上到下递增的顺序排序。
 *      请完成一个函数，输入这样的一个二维数组和一个整数，判断数组中是否含有该整数。
 */

class Solution
{
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
}

$solution = new Solution();
$test = [
    [1,2,8,9  ],
    [2,4,9,12 ],
    [4,7,10,13],
    [6,8,11,15]
];
var_dump($solution->findNumberIn2DArray($test, 7));
var_dump($solution->findNumberIn2DArray($test, 23));
exit;
