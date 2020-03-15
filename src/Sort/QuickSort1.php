<?php
/**
 * User: whh935
 * Date: 2018/12/22 17:58
 * Desc: 快排-递归，详细描述参考-https://www.onmpw.com/tm/xwzj/algorithm_108.html
 */

/**
 * 查找基准位置
 * @param $arr
 * @param $start
 * @param $end
 * @return mixed
 */
function findPv(&$arr, $start, $end)
{
    $p      = $start;
    $value  = $arr[$p];
    while ($start < $end) {
        while ($arr[$end] > $value && $end > $p) {
            $end--;
        }
        $arr[$p]    = $arr[$end];
        $p          = $end;

        while ($arr[$start] < $value && $start < $p) {
            $start++;
        }
        $arr[$p]    = $arr[$start];
        $p          = $start;
    }

    $arr[$p] = $value;
    return $p;
}

/**
 * @param $arr
 * @param $start
 * @param $end
 */
function quickSort(&$arr, $start, $end)
{
    if ($start >= $end) {
        return ;
    }

    $p = findPv($arr, $start, $end);
    quickSort($arr, 0, $p - 1);
    quickSort($arr, $p + 1, $end);
}

$arr = [10, 6, 8, 23, 4, 1, 17, 56, 32, 50];
//$arr = [10, 6, 8, 23, 4];
print_r($arr);
quickSort($arr, 0, count($arr) - 1);
print_r($arr);

