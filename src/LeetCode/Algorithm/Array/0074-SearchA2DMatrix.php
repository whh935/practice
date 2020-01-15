<?php
/**
 * User: whh935
 * Date: 2019/4/16 11:43
 * Desc: LeetCode第74题-https://leetcode-cn.com/problems/search-a-2d-matrix/
 *      在一个从左到右递增，从上到下递增的二维数组矩阵中查找一个数，存在返回true，否则false
 */

/**
 * @param $matrix
 * @param $target
 * @return bool
 */
function searchMatrix($matrix, $target) 
{
	$rows 	 = count($matrix);
	$columns = count($matrix[0]);
	if ($rows == 0 || $columns == 0) {
		return false;
	}       

	$found 	= false;
	$row 	= 0;
	$column = $columns - 1;
	while ($row < $rows && $column >= 0) {
		if ($matrix[$row][$column] == $target) {
			$found = true;
			break;
		} elseif ($matrix[$row][$column] > $target) {
			$column--;
		} else {
			$row++;
		}
	}

	return $found;
}

$matrix = [
  [1,   3,  5,  7],
  [10, 11, 16, 20],
  [23, 30, 34, 50]
];
$target = 3;

var_dump(searchMatrix($matrix, $target));

