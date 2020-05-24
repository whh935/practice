<?php
/**
 * User: whh935
 * Date: 2020/5/13 09:15
 * Desc: 二叉树的最小深度-https://leetcode-cn.com/problems/minimum-depth-of-binary-tree/
 *      给定一个二叉树，找出其最小深度。
 *      最小深度是从根节点到最近叶子节点的最短路径上的节点数量。
 *      说明: 叶子节点是指没有子节点的节点。
 *      示例:
 *      给定二叉树 [3,9,20,null,null,15,7],
 *              3
 *             / \
 *            9  20
 *              /  \
 *             15   7
 *      返回它的最小深度  2.
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
     * @return int|mixed
     */
    function minDepth($root)
    {
        if ($root == null) {
            return 0;
        }

        $left_depth = $this->minDepth($root->left);
        $right_depth = $this->minDepth($root->right);

        //1.如果左孩子和右孩子有为空的情况，直接返回l+r+1
        //2.如果都不为空，返回较小深度+1
        if ($root->left == null || $root->right == null) {
            $depth = $left_depth + $right_depth + 1;
        } else {
            $depth = min($left_depth, $right_depth) + 1;
        }

        return $depth;
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
var_dump($solution->minDepth($a));
