<?php
/**
 * Copyright © 链家网（北京）科技有限公司
 * User: wanghaohua@lianjia.com
 * Date: 2018/12/22 18:18
 * Desc: 快排-非递归，详细描述参考https://www.onmpw.com/tm/xwzj/algorithm_109.html
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
 * 利用栈保存起止位置
 * @param $arr
 */
function PvSort(&$arr)
{
    $stack = [];
    array_push($stack, array(0, count($arr) - 1));
    while (count($stack) > 0) {
        $temp   = array_pop($stack);
        $p      = findPv($arr, $temp[0], $temp[1]);
        if ($p + 1 < $temp[1]) {
            array_push($stack, array($p + 1, $temp[1]));
        }
        if ($temp[0] < $p - 1) {
            array_push($stack, array($temp[0], $p - 1));
        }
    }
}

$arr = [10,6,8,23,4,1,17,56,32,50,11,9];
print_r($arr);
PvSort($arr);
print_r($arr);
