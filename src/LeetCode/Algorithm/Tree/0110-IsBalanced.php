<?php
/**
 * User: whh935
 * Date: 2020/5/18 23:04
 * Desc: 平衡二叉树-https://leetcode-cn.com/problems/balanced-binary-tree/
 *      给定一个二叉树，判断它是否是高度平衡的二叉树。
 *      本题中，一棵高度平衡二叉树定义为：
 *      一个二叉树每个节点 的左右两个子树的高度差的绝对值不超过1。
 *      示例 1:
 *      给定二叉树 [3,9,20,null,null,15,7]
 *          3
 *         / \
 *        9  20
 *          /  \
 *         15   7
 *      返回 true 。
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
    function isBalanced($root)
    {
        return $this->helper($root) >= 0;
    }

    /**
     * @param $root
     * @return int|mixed
     */
    function helper($root)
    {
        if ($root == null) {
            return 0;
        }

        $l = $this->helper($root->left);
        $r = $this->helper($root->right);
        if ($l == -1 || $r == -1 || abs($l - $r ) > 1) {
            return -1;
        }

        return max($l, $r) + 1;
    }
}

$a = new BinaryTreeNode(3);
$b = new BinaryTreeNode(9);
$c = new BinaryTreeNode(20);
$d = new BinaryTreeNode(15);
$e = new BinaryTreeNode(7);

$a->buildTree($b, $c);
$c->buildTree($d, $e);

$solution = new Solution();
var_dump($solution->isBalanced($a));
