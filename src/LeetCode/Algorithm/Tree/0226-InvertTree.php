<?php
/**
 * User: whh935
 * Date: 2020/5/18 21:24
 * Desc: 翻转二叉树-https://leetcode-cn.com/problems/invert-binary-tree/
 *      翻转一棵二叉树。
 *      示例：
 *      输入：
 *              4
 *            /   \
 *           2     7
 *          / \   / \
 *         1   3 6   9
 *
 *      输出：
 *              4
 *            /   \
 *           7     2
 *          / \   / \
 *         9   6 3   1
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

    /**
     * 先序遍历-递归
     * @param $root
     */
    function preOrderByRecursive($root)
    {
        if (!is_null($root)) {
            echo $root->val . ' ';
            $this->preOrderByRecursive($root->left);
            $this->preOrderByRecursive($root->right);
        }
    }
}

class Solution
{
    /**
     * @param $root
     * @return null|BinaryTreeNode
     */
    function invertTree($root)
    {
        if ($root == null) {
            return null;
        }

        $right = $this->invertTree($root->left);
        $left = $this->invertTree($root->right);

        $root->right = $right;
        $root->left = $left;

        return $root;
    }
}

$a = new BinaryTreeNode(4);
$b = new BinaryTreeNode(2);
$c = new BinaryTreeNode(7);
$d = new BinaryTreeNode(1);
$e = new BinaryTreeNode(3);
$f = new BinaryTreeNode(6);
$g = new BinaryTreeNode(9);

$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, $g);

$a->preOrderByRecursive($a);
echo PHP_EOL;

$solution = new Solution();
$a_mirror = $solution->invertTree($a);
$a_mirror->preOrderByRecursive($a_mirror);
echo PHP_EOL;
