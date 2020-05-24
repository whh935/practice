<?php
/**
 * User: whh935
 * Date: 2020/5/24 14:51
 * Desc: 删列造序-https://leetcode-cn.com/problems/delete-columns-to-make-sorted/
 *      给定由 N 个小写字母字符串组成的数组 A，其中每个字符串长度相等。
 *      你需要选出一组要删掉的列 D，对 A 执行删除操作，使 A 中剩余的每一列都是 非降序 排列的，
 *      然后请你返回 D.length 的最小可能值。
 *      删除 操作的定义是：选出一组要删掉的列，删去 A 中对应列中的所有字符，
 *      形式上，第 n 列为 [A[0][n], A[1][n], ..., A[A.length-1][n]]）。
 *      比如，有 A = ["abcdef", "uvwxyz"]，
 *      要删掉的列为 {0, 2, 3}，删除后 A 为["bef", "vyz"]，
 *      A 的列分别为["b","v"], ["e","y"], ["f","z"]。
 *      示例 1：
 *          输入：["cba", "daf", "ghi"]
 *          输出：1
 *          解释：
 *          当选择 D = {1}，删除后 A 的列为：["c","d","g"] 和 ["a","f","i"]，均为非降序排列。
 *          若选择 D = {}，那么 A 的列 ["b","a","h"] 就不是非降序排列了。
 */

class Solution
{
    /**
     * @param $A
     * @return int
     */
    function minDeletionSize($A)
    {
        $num = 0;

        for ($i = 0, $length = strlen($A[0]); $i < $length; $i++) {
            for ($j = 0, $count = count($A) - 1; $j < $count; $j++) {
                if (isset($A[$j + 1][$i]) && $A[$j][$i] > $A[$j + 1][$i]) {
                    $num++;
                    break;
                }
            }
        }

        return $num;
    }
}

$solution = new Solution();
$A = ["cba","daf","ghi"];
var_dump($solution->minDeletionSize($A));
