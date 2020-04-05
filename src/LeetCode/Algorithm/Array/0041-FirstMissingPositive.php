<?php
/**
 * User: whh935
 * Date: 2020/4/5 22:01
 * Desc: LeetCode第41题-https://leetcode-cn.com/problems/first-missing-positive/
 *      给你一个未排序的整数数组，请你找出其中没有出现的最小的正整数。
 *      如输入: [1,2,0]，输出: 3
 *      如输入: [3,4,-1,1]，输出: 2
 *      如输入: [7,8,9,11,12]，输出: 1
 */

/**
 * https://leetcode-cn.com/problems/first-missing-positive/solution/tong-pai-xu-python-dai-ma-by-liweiwei1419/
 * 由于题目要求我们“只能使用常数级别的空间”，而要找的数一定在 [1, N + 1] 左闭右闭（这里 N 是数组的长度）这个区间里。
 * 因此，我们可以就把原始的数组当做哈希表来使用。事实上，哈希表其实本身也是一个数组；
 * 我们要找的数就在 [1, N + 1] 里，最后 N + 1 这个元素我们不用找。因为在前面的 N 个元素都找不到的情况下，我们才返回 N + 1；
 * 那么，我们可以采取这样的思路：就把 1 这个数放到下标为 0 的位置， 2 这个数放到下标为 1 的位置，按照这种思路整理一遍数组。
 * 然后我们再遍历一次数组，第 1 个遇到的它的值不等于下标的那个数，就是我们要找的缺失的第一个正数。
 * 这个思想就相当于我们自己编写哈希函数，这个哈希函数的规则特别简单，那就是数值为 i 的数映射到下标为 i - 1 的位置。
 * @param $nums
 * @return int
 */
function firstMissingPositive($nums)
{
    $n = count($nums);
    for ($i = 0; $i < $n; $i++) {
        while ($nums[$i] > 0 && $nums[$i] <= $n && $nums[$nums[$i] - 1] != $nums[$i]) {
            swap($nums, $nums[$i] - 1, $i);
        }
    }

    for ($i = 0; $i < $n; $i++) {
        if ($nums[$i] != $i + 1) {
            return $i + 1;
        }
    }

    return $n + 1;
}

/**
 * @param $nums
 * @param $index1
 * @param $index2
 */
function swap(&$nums, $index1, $index2)
{
    $tmp = $nums[$index1];
    $nums[$index1] = $nums[$index2];
    $nums[$index2] = $tmp;
}

$nums = [3,4,-1,1];
var_dump(firstMissingPositive($nums));