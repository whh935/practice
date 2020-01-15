<?php
/**
 * User: whh935
 * Date: 2019/4/17 21:29
 * Desc: LeetCode第26题-https://leetcode-cn.com/problems/remove-duplicates-from-sorted-array/
 *      删除排序数组中的重复项，返回数组长度
 */

/**
  * 思路：快慢指针
  */
/**
 * @param $nums
 * @return int
 */
function removeDuplicates(&$nums)
{
    $length = count($nums);
    if ($length < 2) {
        return $length;
    }

    for ($i = 0, $j = 1; $j < $length; $j++) {
        if ($nums[$i] != $nums[$j]) {
            $i++;
            $nums[$i] = $nums[$j];
        }
    }

    return $i + 1;
}

$nums = [0,0,1,1,1,2,2,3,3,4];
var_dump(removeDuplicates($nums));exit;
