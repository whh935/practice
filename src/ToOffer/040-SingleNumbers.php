<?php
/**
 * User: whh935
 * Date: 2020/3/10 22:43
 * Desc: 剑指offer面试题40
 *      一个整型数组 nums 里除两个数字之外，其他数字都出现了两次。
 *      请写程序找出这两个只出现一次的数字。要求时间复杂度是O(n)，空间复杂度是O(1)。
 *      如nums = [1,2,10,4,1,4,3,3]，返回[2,10] 或 [10,2]
 */

/**
 * @param $nums
 * @return array
 */
function singleNumbers($nums)
{
    $ret = 0;
    $a = 0;
    $b = 0;
    //得到异或结果，即为不相同两个数的异或结果ret
    foreach ($nums as $num) {
        $ret ^= $num;
    }

    //得到ret的二进制的1的最低位
    $mask = $ret & (-$ret);

    //分成两个组进行异或，每组异或后的结果就是不相同两个数的其中之一
    foreach ($nums as $num) {
        if (($num & $mask) == 0) {
            $a ^= $num;
        } else {
            $b ^= $num;
        }
    }

    return [$a, $b];
}

$nums = [1,2,10,4,1,4,3,3];
var_dump(singleNumbers($nums));