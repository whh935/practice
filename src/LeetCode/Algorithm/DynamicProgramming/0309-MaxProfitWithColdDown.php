<?php
/**
 * User: whh935
 * Date: 2020/5/21 19:31
 * Desc: 最佳买卖股票时机含冷冻期-https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-with-cooldown/
 *      给定一个整数数组，其中第 i 个元素代表了第 i 天的股票价格 。​
 *      设计一个算法计算出最大利润。在满足以下约束条件下，你可以尽可能地完成更多的交易（多次买卖一支股票）:
 *      你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 *      卖出股票后，你无法在第二天买入股票 (即冷冻期为 1 天)。
 *      示例:
 *          输入: [1,2,3,0,2]
 *          输出: 3
 *          解释: 对应的交易状态为: [买入, 卖出, 冷冻期, 买入, 卖出]
 */

class Solution
{
    /**
     *  状态 dp[i][0]表示第i天不持有股票的最大收益，dp[i][1]表示第i天持有股票的最大收益。
     *  状态转移方程：
     *      1、前一天不持有股票； 或者前一天持有股票，今天卖出。取大的
     *          dp[i][0] = max(dp[i - 1][0], dp[i - 1][1] + prices[i]);
     *      2、前一天持有股票；或者前一天不持有股票，今天买入。取大的
     *          dp[i][1] = max(dp[i - 1][1], dp[i - 2][0] - prices[i]);
     *      初始化
     *          dp[0][0] = 0；dp[0][1] = -prices[0];
     */
    /**
     * @param $prices
     * @return int
     */
    function maxProfit($prices)
    {
        $len = count($prices);
        if ($len < 2) {
            return 0;
        }

        $dp = [];
        $dp[0][0] = 0;
        $dp[0][1] = -$prices[0];
        for ($i = 1; $i < $len; $i++) {
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 2][0] - $prices[$i]);
        }

        return $dp[$len - 1][0];
    }
}

$solution = new Solution();
$prices = [1,2,3,0,2];
var_dump($solution->maxProfit($prices));
