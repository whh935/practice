<?php
/**
 * User: whh935
 * Date: 2020/3/9 15:39
 * Desc: 剑指offer面试题8-旋转数组里的最小数
 *      把一个数组最开始的若干个元素搬到数组的末尾，我们称之为数组的旋转。
 *      输入一个递增排序的数组的一个旋转，输出旋转数组的最小元素。
 *      例如，数组 [3,4,5,1,2] 为 [1,2,3,4,5] 的一个旋转，该数组的最小值为1。
 */

/**
 * 分治法
 * 当numbers[mid] > numbers[high]时，说明最小值在mid的右边，缩小范围low = mid + 1
 * 当numbers[mid] == numbers[high]时，虽然不知道最小值的范围，但是可以肯定的是去除numbers[high]是没有影响的，缩小范围high -= 1
 * 当numbers[mid] < numbers[high]时，最小值的不是numbers[mid]，就是在mid的左边，缩小范围high = mid
 * @param $numbers
 * @return null
 */
function minArray($numbers)
{
    if (empty($numbers)) {
        return null;
    }

    $low = 0;
    $high = count($numbers) - 1;
    while ($low < $high) {
        $mid = ($low + $high) >> 1;
        if ($numbers[$mid] > $numbers[$high]) {
            $low = $mid + 1;
        } elseif ($numbers[$mid] == $numbers[$high]) {
            $high -= 1;
        } else {
            $high = $mid;
        }
    }

    return $numbers[$low];
}

//$numbers = [3,4,5,1,2];
$numbers = [1,0,1,1,1];
var_dump(minArray($numbers));