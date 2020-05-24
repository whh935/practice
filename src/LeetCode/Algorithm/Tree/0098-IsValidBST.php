<?php
/**
 * User: whh935
 * Date: 2020/5/5 10:51
 * Desc: 验证二叉搜索树-https://leetcode-cn.com/problems/validate-binary-search-tree/
 *      给定一个二叉树，判断其是否是一个有效的二叉搜索树。
 *      假设一个二叉搜索树具有如下特征：
 *          节点的左子树只包含小于当前节点的数。
 *          节点的右子树只包含大于当前节点的数。
 *          所有左子树和右子树自身必须也是二叉搜索树。
 *      输入:
 *          2
 *         / \
 *        1   3
 *      输出: true
 */

class BinaryTreeNode
{
    public $left = null;
    public $right = null;
    public $val = '';

    /**
     * BinaryTreeNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->val = $value;
        return $this;
    }

    /**
     * 构建二叉树
     * @param BinaryTreeNode|null $left_child
     * @param BinaryTreeNode|null $right_child
     */
    public function buildTree(BinaryTreeNode $left_child = null, BinaryTreeNode $right_child = null)
    {
        if (!is_null($left_child)) {
            $this->left = $left_child;
        }
        if (!is_null($right_child)) {
            $this->right = $right_child;
        }
    }
}

class Solution
{
    /**
     * @param $root
     * @return bool
     */
    function isValidBST($root)
    {
        return $this->isValidBSTCore($root, PHP_INT_MIN, PHP_INT_MAX);
    }

    /**
     * @param $root
     * @param $lower
     * @param $upper
     * @return bool
     */
    function isValidBSTCore($root, $lower, $upper)
    {
        if ($root == null) {
            return true;
        }
        if ($root->val <= $lower || $root->val >= $upper) {
            return false;
        }

        return $this->isValidBSTCore($root->left, $lower, $root->val)
                && $this->isValidBSTCore($root->right, $root->val, $upper);
    }
}

$a = new BinaryTreeNode(2);
$b = new BinaryTreeNode(1);
$c = new BinaryTreeNode(3);

$a->buildTree($b, $c);

$solution = new Solution();
var_dump($solution->isValidBST($a));
