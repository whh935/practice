<?php
/**
 * User: whh935
 * Date: 2020/5/21 22:29
 * Desc:
 */

/**
 * @param $nums
 * @param $target
 * @return int
 */
function calMatchNumbers($nums, $target)
{
    $len = count($nums);
    if ($len <= 1) {
        return 0;
    }

    $cnt = 0;
    $i = 0;
    $j = $len - 1;
    while ($i < $j) {
        $sum = $nums[$i] + $nums[$j];
        if ($sum == $target) {
            $dup1 = 0;
            $dup2 = 0;

            $cnt++;
            $i++;
            $j--;
            while ($j >= $i && $nums[$j] == $nums[$j + 1]) {
                $dup1++;
                $j--;
            }
            while ($j >= $i && $nums[$i] == $nums[$i - 1]) {
                $dup2++;
                $i++;
            }
            $cnt += (($dup1 + 1) * ($dup2 + 1) - 1);
        } elseif ($sum > $target) {
            $j--;
            while ($j >= $i && $nums[$j] == $nums[$j + 1]) {
                $j--;
            }
        } else {
            $i++;
            while ($j >= $i && $nums[$i] == $nums[$i - 1]) {
                $i++;
            }
        }
    }

    return $cnt;
}

$nums = [1,1,1,2,6,7,7];
//$nums = [1,2,3,4,5,6,7];
//$nums = [1,2];
$target = 8;
var_dump(calMatchNumbers($nums, $target));