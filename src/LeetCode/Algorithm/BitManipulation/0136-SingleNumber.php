<?php
/**
 * User: whh935
 * Date: 2020/5/14 08:51
 * Desc: 只出现一次的数字-https://leetcode-cn.com/problems/single-number/
 *      给定一个非空整数数组，除了某个元素只出现一次以外，其余每个元素均出现两次。找出那个只出现了一次的元素。
 *      说明：
 *      你的算法应该具有线性时间复杂度。 你可以不使用额外空间来实现吗？
 *      示例 1:
 *          输入: [2,2,1]
 *          输出: 1
 *      示例 2:
 *          输入: [4,1,2,1,2]
 *          输出: 4
 */

class Solution
{
    /**
     * @param $nums
     * @return int
     */
    function singleNumber($nums)
    {
        $single = 0;
        foreach ($nums as $num) {
            $single ^= $num;
        }

        return $single;
    }
}

$solution = new Solution();
$nums = [2,2,1];
var_dump($solution->singleNumber($nums));
