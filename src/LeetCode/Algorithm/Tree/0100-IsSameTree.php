<?php
/**
 * User: whh935
 * Date: 2020/5/13 09:30
 * Desc: 相同的树-https://leetcode-cn.com/problems/same-tree/
 *      给定两个二叉树，编写一个函数来检验它们是否相同。
 *      如果两个树在结构上相同，并且节点具有相同的值，则认为它们是相同的。
 *      示例 1:
 *      输入:       1         1
 *                / \       / \
 *               2   3     2   3
 *              [1,2,3],   [1,2,3]
 *      输出: true
 */

class Solution
{
    /**
     * @param $p
     * @param $q
     * @return bool
     */
    function isSameTree($p, $q)
    {
        if ($p == null && $q == null) {
            return true;
        }
        if ($p == null || $q == null) {
            return false;
        }
        if ($p->val != $q->val) {
            return false;
        }

        return $this->isSameTree($p->left, $q->left)
            && $this->isSameTree($p->right, $q->right);
    }
}