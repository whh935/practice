<?php
/**
 * User: whh935
 * Date: 2020/5/21 19:34
 * Desc: 买卖股票的最佳时机 III-https://leetcode-cn.com/problems/best-time-to-buy-and-sell-stock-iii/
 *      给定一个数组，它的第 i 个元素是一支给定的股票在第 i 天的价格。
 *      设计一个算法来计算你所能获取的最大利润。你最多可以完成 两笔 交易。
 *      注意: 你不能同时参与多笔交易（你必须在再次购买前出售掉之前的股票）。
 *      示例 1:
 *          输入: [3,3,5,0,0,3,1,4]
 *          输出: 6
 *          解释: 在第 4 天（股票价格 = 0）的时候买入，在第 6 天（股票价格 = 3）的时候卖出，这笔交易所能获得利润 = 3-0 = 3 。
 *              随后，在第 7 天（股票价格 = 1）的时候买入，在第 8 天 （股票价格 = 4）的时候卖出，这笔交易所能获得利润 = 4-1 = 3 。
 */

class Solution
{
    /**
     * 算法
     * 状态, dp[i][j][0]表示第i天进行了j次交易，目前不持有股票；dp[i][j][1]表示第i天进行了j次交易，目前持有股票.
     * 状态转移方程
     *  1、当天进行了j次交易，并不持有股票的最大收益为两种情况取大者：
     *      一、前一天交易了j次本身也不持有股票；
     *      二、前一天进行了j次交易，并持有股票，今天卖了。交易发生在当天，所以前一天的交易次数是j, 不是j - 1。
     *      dp[i][j][0] = max(dp[i - 1][j][0], dp[i - 1][j][1] + prices[i]);
     *  2、当天进行了j次交易，并持有股票的最大收益为两种情况取大者：
     *      一、前一天交易了j次本身持有股票；
     *      二、前一天进行了最多j - 1次交易，并不持有股票，当天买入了。当天还能买入，说明之前交易次数没有达到j次。
     *      dp[i][j][1] = max(dp[i - 1][j][1], dp[i - 1][j - 1][0] - prices[i]);
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
        $deal_count = 2;
        for ($i = 0; $i < $len; $i++) {
            for ($j = $deal_count; $j >= 1; $j--) {
                if ($i == 0) {
                    $dp[$i][$j][0] = 0;
                    $dp[$i][$j][1] = -$prices[$i];
                    continue;
                }

                $dp[$i][$j][0] = max($dp[$i - 1][$j][0], $dp[$i - 1][$j][1] + $prices[$i]);
                $dp[$i][$j][1] = max($dp[$i - 1][$j][1], $dp[$i - 1][$j - 1][0] - $prices[$i]);
            }
        }

        return $dp[$len - 1][$deal_count][0];
    }
}

$solution = new Solution();
$prices = [3,3,5,0,0,3,1,4];
var_dump($solution->maxProfit($prices));
