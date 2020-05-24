<?php
/**
 * User: whh935
 * Date: 2020/5/12 09:00
 * Desc: 二叉树中的最大路径和-https://leetcode-cn.com/problems/binary-tree-maximum-path-sum/
 *      给定一个非空二叉树，返回其最大路径和。
 *      本题中，路径被定义为一条从树中任意节点出发，达到任意节点的序列。该路径至少包含一个节点，且不一定经过根节点。
 *      示例 1:
 *          输入: [1,2,3]
 *              1
 *             / \
 *            2   3
 *          输出: 6
 */

class Solution
{
    private $max = PHP_INT_MIN;

    /**
     * @param $root
     * @return int
     */
    function maxPathSum($root)
    {
        $this->dfs($root);
        return $this->max;
    }

    /**
     * @param $root
     * @return int
     */
    function dfs($root)
    {
        if ($root == null) {
            return 0;
        }

        $left_max = max($this->dfs($root->left), 0);
        $right_max = max($this->dfs($root->right), 0);
        $this->max = max($this->max, $root->val + $left_max + $right_max);
        return $root->val + max($left_max, $right_max);
    }
}