<?php
/**
 * Copyright © 链家网（北京）科技有限公司
 * User: wanghaohua@lianjia.com
 * Date: 2018/12/22 18:48
 * Desc: 大根堆排序，详细描述参考https://www.onmpw.com/tm/xwzj/algorithm_110.html
 */

/**
 * 交换函数
 * @param $arr
 * @param $a
 * @param $b
 */
function swap(&$arr, $a, $b)
{
    $t = $arr[$a];
    $arr[$a] = $arr[$b];
    $arr[$b] = $t;
}

/**
 * 调整一个节点和其左右子节点满足大顶堆的性质
 * @param $arr
 * @param $pos
 * @param $end
 * @return bool
 */
function makeHeapChild(&$arr, $pos, $end)
{
    $p = false;
    if ($pos * 2 + 1 <= $end) {
        //左右子节点相比较，找出最大节点
        if ($arr[$pos * 2 - 1] >= $arr[$pos * 2]) {
            $p = $pos * 2;
        } else {
            $p = $pos * 2 + 1;
        }
    } elseif ($pos * 2 <= $end) {
        $p = $pos * 2;
    }

    if (!$p) return $p;

    //比较当前节点和其最大的子节点
    if ($arr[$pos - 1] <= $arr[$p - 1]) {
        swap($arr, $pos - 1, $p - 1);
        return $p;
    }

    return false;
}

/**
 * @param $arr
 */
function heapSort(&$arr)
{
    $start  = floor(count($arr) / 2);//找到最后一个非叶子节点
    $end    = count($arr);

    //构造大顶堆
    while ($start > 0) {
        $p = $start;
        while ($p) {
            $p = makeHeapChild($arr, $p, $end);
        }
        $start--;
    }

    //交换顶部节点和最后一个叶子节点 依次调整大顶堆
    while ($end > 1) {
        swap($arr, 0, $end - 1);
        $end--;
        $p = 1;
        while ($p) {
            $p = makeHeapChild($arr, $p, $end);
        }
    }
}

$arr = [10, 6, 8, 23, 4, 1, 17, 56, 32, 50, 11, 9];
print_r($arr);
heapSort($arr);
print_r($arr);

