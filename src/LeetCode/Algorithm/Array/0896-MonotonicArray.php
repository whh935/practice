<?php
/**
 * User: whh935
 * Date: 2019/6/19 17:10
 * Desc: 单调数列-https://leetcode-cn.com/problems/monotonic-array/
 *      如果数组是单调递增或单调递减的，那么它是单调的。
 *      如果对于所有 i <= j，A[i] <= A[j]，那么数组 A 是单调递增的。
 *      如果对于所有 i <= j，A[i] >= A[j]，那么数组 A 是单调递减的。
 *      当给定的数组 A 是单调数组时返回 true，否则返回 false。
 *      示例 1：
 *          输入：[1,2,2,3]
 *          输出：true
 */

class Solution
{
    /**
     * @param $A
     * @return bool
     */
    function isMonotonic($A)
    {
        $length = count($A);

        $increasing = true;
        $decreasing = true;
        for ($i = 0; $i < $length - 1; $i++) {
            if ($A[$i] > $A[$i + 1]) {
                $increasing = false;
            } elseif ($A[$i] < $A[$i + 1]) {
                $decreasing = false;
            }
        }

        return $increasing || $decreasing;
    }
}

$solution = new Solution();
//$arr = [11,11,9,4,3,3,3,1,-1,-1,3,3,3,5,5,5];
//$arr = [1,3,2];
//$arr = [1,2,3,4,5,5,4,3,2,1];

//$arr = [1,2,2,3];
//$arr = [1,1,1];
$arr = [6,5,4,4];
var_dump($solution->isMonotonic($arr));exit;
