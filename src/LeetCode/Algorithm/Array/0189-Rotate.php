<?php
/**
 * User: whh935
 * Date: 2020/4/6 11:06
 * Desc: LeetCode第189题-https://leetcode-cn.com/problems/rotate-array/
 *      给定一个数组，将数组中的元素向右移动 k 个位置，其中 k 是非负数。
 *      输入: [1,2,3,4,5,6,7] 和 k = 3
 *      输出: [5,6,7,1,2,3,4]
 *      解释:
 *          向右旋转 1 步: [7,1,2,3,4,5,6]
 *          向右旋转 2 步: [6,7,1,2,3,4,5]
 *          向右旋转 3 步: [5,6,7,1,2,3,4]
 */

class Solution
{
    /**
     * 暴力破解：从尾到前循环k次，时间复杂度O(nk)，空间复杂度O(1)
     * 数据量大时会超出时间限制
     * https://leetcode-cn.com/submissions/detail/60276936/testcase/
     * @param $nums
     * @param $k
     */
    function rotate1(&$nums, $k)
    {
        $n = count($nums);
        if ($n == 0 || $n == 1 || $k <= 0) {
            return ;
        }

        $k %= $n;
        while ($k-- > 0) {
            $last = $nums[$n - 1];
            for ($i = $n - 1; $i >= 1; $i--) {
                $nums[$i] = $nums[$i - 1];
            }
            $nums[0] = $last;
        }
    }

    /**
     * 反转法：当我们旋转数组 k 次， k % n 个尾部元素会被移动到头部，剩下的元素会被向后移动。
     * 在这个方法中，我们首先将所有元素反转。然后反转前 k 个元素，再反转后面 n-k 个元素，
     * 就能得到想要的结果。
     * @param $nums
     * @param $k
     */
    function rotate2(&$nums, $k)
    {
        $n = count($nums);
        if ($n == 0 || $n == 1 || $k <= 0) {
            return ;
        }

        $k %= $n;
        $this->reverse($nums, 0, $n - 1);
        $this->reverse($nums, 0, $k - 1);
        $this->reverse($nums, $k, $n - 1);
    }

    /**
     * @param $nums
     * @param $start
     * @param $end
     */
    function reverse(&$nums, $start, $end)
    {
        while ($start < $end) {
            $tmp = $nums[$end];
            $nums[$end] = $nums[$start];
            $nums[$start] = $tmp;

            $start++;
            $end--;
        }
    }
}

$solution = new Solution();
$nums = [1,2,3,4,5,6,7];
$k = 3;
//$solution->rotate1($nums, $k);
//var_dump($nums);

$solution->rotate2($nums, $k);
var_dump($nums);
