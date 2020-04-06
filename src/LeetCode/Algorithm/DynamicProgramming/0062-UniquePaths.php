<?php
/**
 * User: whh935
 * Date: 2020/4/5 12:17
 * Desc: LeetCode第62题-https://leetcode-cn.com/problems/unique-paths/
 *      一个机器人位于一个 m x n 网格的左上角 （起始点在下图中标记为“Start” ）。
 *      机器人每次只能向下或者向右移动一步。机器人试图达到网格的右下角（在下图中标记为“Finish”）。
 *      问总共有多少条不同的路径？
 *      注意：m为列，n为行
 *      输入: m = 3, n = 2，输出: 3
 *      解释: 从左上角开始，总共有 3 条路径可以到达右下角。
 *      1. 向右 -> 向右 -> 向下
 *      2. 向右 -> 向下 -> 向右
 *      3. 向下 -> 向右 -> 向右
 */

class Solution
{
    /**
     * 状态转移方程：dp[i][j] = dp[i - 1][j] + dp[i][j - 1]
     * 初始化(第一行和第一列只有一条路可走)：dp[i][0] = 1; dp[0][j] = 1
     * @param $m
     * @param $n
     * @return mixed
     */
    function uniquePaths($m, $n)
    {
        $dp = [];
        for ($i = 0; $i < $n; $i++) {
            $dp[$i][0] = 1;
        }
        for ($j = 0; $j < $m; $j++) {
            $dp[0][$j] = 1;
        }

        for ($i = 1; $i < $n; $i++) {
            for ($j = 1; $j < $m; $j++) {
                $dp[$i][$j] = $dp[$i - 1][$j] + $dp[$i][$j - 1];
            }
        }

        return $dp[$n - 1][$m - 1];
    }
}

$solution = new Solution();
$m = 7;
$n = 3;
var_dump($solution->uniquePaths($m, $n));

