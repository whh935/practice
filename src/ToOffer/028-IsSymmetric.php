<?php
/**
 * User: whh935
 * Date: 2020/4/12 11:11
 * Desc: 剑指offer面试题28-https://leetcode-cn.com/problems/dui-cheng-de-er-cha-shu-lcof/
 *      对称的二叉树
 *      请实现一个函数，用来判断一棵二叉树是不是对称的。如果一棵二叉树和它的镜像一样，那么它是对称的。
 *      例如，二叉树 [1,2,2,3,4,4,3] 是对称的。
 *               1
 *             /   \
 *            2     2
 *           / \   / \
 *          3   4 4   3
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
    function isSymmetric($root)
    {
        if ($root == null) {
            return true;
        }

        return $this->isMirror($root->left, $root->right);
    }

    /**
     * @param $p
     * @param $q
     * @return bool
     */
    function isMirror($p, $q)
    {
        if ($p == null && $q == null) {
            return true;
        } elseif ($p == null || $q == null || $p->val != $q->val) {
            return false;
        } else {
            return $this->isMirror($p->left, $q->right) && $this->isMirror($p->right, $q->left);
        }
    }
}

$a = new BinaryTreeNode(1);
$b = new BinaryTreeNode(2);
$c = new BinaryTreeNode(2);
$d = new BinaryTreeNode(3);
$e = new BinaryTreeNode(4);
$f = new BinaryTreeNode(4);
$g = new BinaryTreeNode(3);

$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, $g);

$solution = new Solution();
var_dump($solution->isSymmetric($a));
