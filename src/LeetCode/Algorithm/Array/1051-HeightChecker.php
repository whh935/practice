<?php
/**
 * User: whh935
 * Date: 2019/9/17 23:12
 * Desc: 高度检查器-https://leetcode-cn.com/problems/height-checker/
 *      学校在拍年度纪念照时，一般要求学生按照 非递减 的高度顺序排列。
 *      请你返回能让所有学生以 非递减 高度排列的最小必要移动人数。
 *      注意，当一组学生被选中时，他们之间可以以任何可能的方式重新排序，而未被选中的学生应该保持不动。
 *      示例：
 *          输入：heights = [1,1,4,2,1,3]
 *          输出：3
 *          解释：
 *          当前数组：[1,1,4,2,1,3]
 *          目标数组：[1,1,1,2,3,4]
 *          在下标 2 处（从 0 开始计数）出现 4 vs 1 ，所以我们必须移动这名学生。
 *          在下标 4 处（从 0 开始计数）出现 1 vs 3 ，所以我们必须移动这名学生。
 *          在下标 5 处（从 0 开始计数）出现 3 vs 4 ，所以我们必须移动这名学生。
 */

class Solution
{
    /**
     * 排序后对比计数每个位置的不同数量
     * @param $heights
     * @return int
     */
    function heightChecker1($heights)
    {
        $arr = $heights;
        sort($arr);

        $cnt = count($heights) - count(array_intersect_assoc($heights, $arr));
        return $cnt;
    }

    /**
     * 基于桶排序思想
     * @param $heights
     * @return int
     */
    function heightChecker2($heights)
    {
        $arr = [];
        for ($i = 0; $i <= 100; $i++) {
            $arr[$i] = 0;
        }
        foreach ($heights as $height) {
            $arr[$height]++;
        }

        $cnt = 0;
        $length = count($arr);
        for ($i = 1, $j = 0; $i < $length; $i++) {
            //从桶中取出元素时，元素的排列顺序就是非递减的，然后与heights中的元素比较，如果不同，计算器就加1
            while ($arr[$i]-- > 0) {
                if ($heights[$j++] != $i) {
                    $cnt++;
                }
            }
        }

        return $cnt;
    }
}

$solution = new Solution();
$heights = [1,1,4,2,1,3];
//$heights = [23,52,46,7,50,87,20,32,85,65,62,34,8,86,15,66,66,30,11,96,18,26,24,10,57,13,37,69,85,6,8,17,40,88,14,72,85,51,40,38,54,65,65,27,18,59,77,12,25,46,10,19,10,28,64,79,5,88,2,1,14,50,91,34,58,32,90,67,28,81,84,76,88,45,42,54,59,56,20,6,56,51,72,69,6,48,67,68,6,10,93,69,4,29,28];
echo 'heightChecker1' . PHP_EOL;
var_dump($solution->heightChecker1($heights));

echo 'heightChecker2' . PHP_EOL;
var_dump($solution->heightChecker2($heights));
