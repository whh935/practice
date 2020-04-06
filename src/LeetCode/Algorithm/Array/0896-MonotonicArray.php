<?php
/**
 * User: whh935
 * Date: 2019/6/19 17:10
 * Desc: LeetCode第896题-https://leetcode-cn.com/problems/monotonic-array/
 *      判断数组是否是单调的
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
