<?php
/**
 * User: whh935
 * Date: 2020/5/12 23:56
 * Desc: 路径总和-https://leetcode-cn.com/problems/path-sum/
 *      给定一个二叉树和一个目标和，判断该树中是否存在根节点到叶子节点的路径，这条路径上所有节点值相加等于目标和。
 *      说明: 叶子节点是指没有子节点的节点。
 *      示例: 
 *      给定如下二叉树，以及目标和 sum = 22，
 *              5
 *             / \
 *            4   8
 *           /   / \
 *          11  13  4
 *         /  \      \
 *        7    2      1
 *      返回 true, 因为存在目标和为 22 的根节点到叶子节点的路径 5->4->11->2。
 */

class Solution
{
    /**
     * @param $root
     * @param $sum
     * @return bool
     */
    function hasPathSum($root, $sum)
    {
        return $this->helper($root, 0, $sum);
    }

    /**
     * @param $node
     * @param $cur
     * @param $sum
     * @return bool
     */
    function helper($node, $cur, $sum)
    {
        if ($node == null) {
            return false;
        }

        $cur = $cur + $node->val;
        if ($node->left == null && $node->right == null) {
            return $cur == $sum;
        } else {
            return $this->helper($node->left, $cur, $sum)
                || $this->helper($node->right, $cur, $sum);
        }
    }
}