<?php
/**
 * User: whh935
 * Date: 2020/3/10 19:05
 * Desc: 剑指offer面试题61-https://leetcode-cn.com/problems/bu-ke-pai-zhong-de-shun-zi-lcof/
 *      从扑克牌中随机抽5张牌，判断是不是一个顺子，即这5张牌是不是连续的。
 *      2～10为数字本身，A为1，J为11，Q为12，K为13，而大、小王为 0 ，可以看成任意数字。A 不能视为 14。
 */

class Solution
{
    /**
     * 排序之后扑克牌就有序了，可以直接判断相邻两张牌之间需要多少个大王或小王来填补。
     * 如果需要填补大小王的数量，大于已有大小王的数量，则返回 false .
     * 相反，如果需要填补大小王的数量，小于或等于已有大小王的数量，则返回 true .
     * 例如：扑克牌： 0 1 4 5 6，我们发现 1 和 4 之间需要 4 - 1 - 1 张大王或小王来填补
     * 但大王或小王只有 1 张，所以它不可以构成顺子
     * @param $nums
     * @return bool
     */
    function isStraight($nums)
    {
        sort($nums);
        $zero_nums = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($nums[$i] == 0) {
                $zero_nums++;
                continue;
            }

            if ($nums[$i] == $nums[$i + 1]) {
                return false;
            }
            $zero_nums -= ($nums[$i + 1] - $nums[$i] - 1);
        }

        return $zero_nums >= 0;
    }
}

$solution = new Solution();
//$nums = [1,2,3,4,5];
$nums = [0,0,1,2,5];
var_dump($solution->isStraight($nums));
