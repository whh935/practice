<?php
/**
 * User: whh935
 * Date: 2020/5/21 18:56
 * Desc: 买卖股票的最佳时机 II-https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-ii/
 *      给定一个数组，它的第 i 个元素是一支给定股票第 i 天的价格。
 *      设计一个算法来计算你所能获取的最大利润。你可以尽可能地完成更多的交易（多次买卖一支股票）。
 *      注意：你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 *      示例 1:
 *          输入: [7,1,5,3,6,4]
 *          输出: 7
 *          解释: 在第 2 天（股票价格 = 1）的时候买入，在第 3 天（股票价格 = 5）的时候卖出, 这笔交易所能获得利润 = 5-1 = 4 。
 *               随后，在第 4 天（股票价格 = 3）的时候买入，在第 5 天（股票价格 = 6）的时候卖出, 这笔交易所能获得利润 = 6-3 = 3 。
 */

class Solution
{
    /**
     * 贪心算法
     * @param $prices
     * @return int
     */
    function maxProfit1($prices)
    {
        $max_profit = 0;
        $len = count($prices);
        for ($i = 1; $i < $len; $i++) {
            $tmp = $prices[$i] - $prices[$i - 1];
            if ($tmp > 0) {
                $max_profit += $tmp;
            }
        }

        return $max_profit;
    }

    /**
     * 状态 dp[i][0]表示第i天不持有股票的最大收益，dp[i][1]表示第i天持有股票的最大收益。
     * 状态转移方程：
     *  1、前一天不持有股票； 或者前一天持有股票，今天卖出。取大的
     *      dp[i][0] = max(dp[i - 1][0], dp[i - 1][1] + prices[i]);
     *  2、前一天持有股票；或者前一天不持有股票，今天买入。取大的
     *      dp[i][1] = max(dp[i - 1][1], dp[i - 1][0] - prices[i]);
     *  初始化
     *      dp[0][0] = 0；dp[0][1] = -prices[0];
     */
    /**
     * 动态规划
     * @param $prices
     * @return int
     */
    function maxProfit2($prices)
    {
        $len = count($prices);
        if ($len < 2) {
            return 0;
        }

        $dp[0][0] = 0;
        $dp[0][1] = -$prices[0];
        for ($i = 1; $i < $len; $i++) {
            $dp[$i][0] = max($dp[$i - 1][0], $dp[$i - 1][1] + $prices[$i]);
            $dp[$i][1] = max($dp[$i - 1][1], $dp[$i - 1][0] - $prices[$i]);
        }

        return $dp[$len - 1][0];
    }
}

$solution = new Solution();
$prices = [7,1,5,3,6,4];
var_dump($solution->maxProfit1($prices));
var_dump($solution->maxProfit2($prices));
