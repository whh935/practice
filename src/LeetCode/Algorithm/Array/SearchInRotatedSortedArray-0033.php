<?php
/**
 * User: whh935
 * Date: 2019/4/17 18:38
 * Desc: LeetCode第33题-https://leetcode.com/problems/search-in-rotated-sorted-array/
 *      在旋转排序数组中查找一个数，存在返回下标，否则返回-1
 */

/**
  * 思路:借助二分查找的思路，比较$nums[0]和$target的值来判断不同的case
  */
function search($nums, $target)
{
    $length = count($nums);
    if ($length == 0) {
        return -1;
    }

    $left  = 0;
    $right = $length - 1;
    while ($left <= $right) {
        $mid = intval($left + ($right - $left) / 2);
        if ($nums[$mid] == $target) {
            return $mid;
        }

        if ($target >= $nums[0] && $nums[0] > $nums[$mid]) {
            $right = $mid - 1;
        } elseif ($target < $nums[0] && $nums[0] <= $nums[$mid]) {
            $left = $mid + 1;
        } else {
            if ($nums[$mid] > $target) {
                $right = $mid - 1;
            } else {
                $left = $mid + 1;
            }
        }
    }

    return -1;
}


$nums = [4,5,6,7,0,1,2];
$target = 0;

//$nums = [1,3];
//$target = 1;
var_dump(search($nums, $target));
exit;
