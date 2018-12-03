<?php

/**
 * Copyright © 链家网（北京）科技有限公司
 * User: wanghaohua@lianjia.com
 * Date: 2018/12/3 12:02
 * Desc: 直接插入排序
 */

/**
 * 从第一个元素开始向后遍历，找到相应的位置，然后进行元素移动和插入
 * @param $arr
 */
function directInsertSort1(&$arr)
{
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        $p = $arr[$i];
        for ($j = 0; $j < $i; $j++) {
            if ($arr[$j] > $p) {
                break;
            }
        }

        for ($k = $i - 1; $k >= $j; $k--) {
            $arr[$k + 1] = $arr[$k];
        }

        $arr[$j] = $p;
    }
}

$arr1 = [
    15,77,23,43,90,87,68,32,11,22,33,99,88,66,44,113,
    224,765,980,159,456,7,998,451,96,0,673,82,91,100
];
directInsertSort1($arr1);
echo 'directInsertSort1:' . PHP_EOL;
var_dump($arr1);


/**
 * 从当前待排序元素的前一个元素（也就是有序序列的最后一个元素）开始向前遍历，找到相应的位置，然后进行元素移动和插入
 * @param $arr
 */
function directInsertSort2(&$arr)
{
    $length = count($arr);
    for ($i = 1; $i < $length; $i++) {
        $p = $arr[$i];
        for ($j = $i - 1; $j >= 0; $j--) {
            if ($arr[$j] > $p) {
                $arr[$j + 1] = $arr[$j];
            } else {
                break;
            }
        }

        $arr[$j + 1] = $p;
    }
}

$arr2 = [
    15,77,23,43,90,87,68,32,11,22,33,99,88,66,44,113,
    224,765,980,159,456,7,998,451,96,0,673,82,91,100
];
directInsertSort2($arr2);
echo 'directInsertSort2:' . PHP_EOL;
var_dump($arr2);