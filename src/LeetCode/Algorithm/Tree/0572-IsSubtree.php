<?php
/**
 * User: whh935
 * Date: 2020/5/7 22:32
 * Desc: 另一个树的子树-https://leetcode-cn.com/problems/subtree-of-another-tree/
 *      给定两个非空二叉树 s 和 t，检验 s 中是否包含和 t 具有相同结构和节点值的子树。
 *      s 的一个子树包括 s 的一个节点和这个节点的所有子孙。s 也可以看做它自身的一棵子树。
 *      示例 1:
 *      给定的树 s:
 *          3
 *         / \
 *        4   5
 *       / \
 *      1   2
 *      给定的树 t：
 *          4
 *         / \
 *        1   2
 *      返回 true，因为 t 与 s 的一个子树拥有相同的结构和节点值。
 */

class Solution
{
    /**
     * https://leetcode-cn.com/problems/subtree-of-another-tree/solution/572ti-ling-yi-ge-shu-de-zi-shu-by-iceblood/
     * @param $s
     * @param $t
     * @return bool
     */
    function isSubtree($s, $t)
    {
        if ($t == null) {
            return true;
        }
        if ($s == null) {
            return false;
        }

        return $this->isSameTree($s, $t)
            || $this->isSubtree($s->left, $t)
            || $this->isSubtree($s->right, $t);
    }

    /**
     * @param $s
     * @param $t
     * @return bool
     */
    function isSameTree($s, $t)
    {
        if ($s == null && $t == null) {
            return true;
        }
        if ($s == null || $t == null) {
            return false;
        }
        if ($s->val != $t->val) {
            return false;
        }

        return $this->isSameTree($s->left, $t->left)
            && $this->isSameTree($s->right, $t->right);
    }
}