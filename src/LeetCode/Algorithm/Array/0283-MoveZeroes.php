<?php
/**
 * User: whh935
 * Date: 2020/3/4 20:21
 * Desc: 移动零-https://leetcode-cn.com/problems/move-zeroes/
 *      给定一个数组nums，编写一个函数将所有0移动到数组的末尾，同时保持非零元素的相对顺序。
 *      示例:
 *          输入: [0,1,0,3,12]
 *          输出: [1,3,12,0,0]
 *      说明:
 *          必须在原数组上操作，不能拷贝额外的数组。
 *          尽量减少操作次数。
 */

class Solution
{
    /**
     * 这里参考了快速排序的思想，快速排序首先要确定一个待分割的元素做中间点x，
     * 然后把所有小于等于x的元素放到x的左边，大于x的元素放到其右边。
     * 这里我们可以用0当做这个中间点，把不等于0(注意题目没说不能有负数)的放到中间点的左边，等于0的放到其右边。
     * 这的中间点就是0本身，所以实现起来比快速排序简单很多，
     * 我们使用两个指针i和j，只要nums[i]!=0，我们就交换nums[i]和nums[j]
     * @param $nums
     */
    function moveZeroes(&$nums)
    {
        if (empty($nums)) {
            return ;
        }

        $j = 0;
        $len = count($nums);
        for ($i = 0; $i < $len; $i++) {
            if ($nums[$i] != 0) {
                $tmp = $nums[$i];
                $nums[$i] = $nums[$j];
                $nums[$j++] = $tmp;
            }
        }
    }
}

$solution = new Solution();
$nums = [0,1,0,3,12];
$solution->moveZeroes($nums);
var_dump($nums);