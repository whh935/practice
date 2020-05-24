<?php
/**
 * User: whh935
 * Date: 2020/4/27 08:55
 * Desc: 找出数组里满足大于左边所有数且小于右边所有数的这些数的集合
 *      如：7,10,2,11,15,12,20,25，结果为11,20
 */

/**
 * @param $nums
 * @return array
 */
function calMatchNumbers($nums)
{
    $n = count($nums);
    if ($n <= 2) {
        return [];
    }

    $left_max[0] = $nums[0];
    $right_min[$n - 1] = $nums[$n - 1];
    for ($i = 1; $i < $n; $i++) {
        $left_max[$i] = max($left_max[$i - 1], $nums[$i - 1]);

        $j = $n - $i - 1;
        $right_min[$j] = min($right_min[$j + 1], $nums[$j + 1]);
    }

    $ans = [];
    foreach ($nums as $idx => $num) {
        if ($num > $left_max[$idx] && $num < $right_min[$idx]) {
            $ans[] = $num;
        }
    }

    return $ans;
}

$nums = [7,10,2,11,15,12,20,25];
//$nums = [7,10];
var_dump(calMatchNumbers($nums));
