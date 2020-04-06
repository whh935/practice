<?php
/**
 * User: whh935
 * Date: 2020/3/29 22:11
 * Desc: LeetCode第104题-https://leetcode-cn.com/problems/maximum-depth-of-binary-tree/
 *      给定一个二叉树，找出其最大深度。
 *      二叉树的深度为根节点到最远叶子节点的最长路径上的节点数。
 *      说明: 叶子节点是指没有子节点的节点。
 *      示例：给定二叉树 [3,9,20,null,null,15,7]，
 *          3
 *         / \
 *        9  20
 *          /  \
 *         15   7
 *      返回它的最大深度 3 。
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
     * 利用递归计算深度
     * @param $root
     * @return int|mixed
     */
    function maxDepth1($root)
    {
        if ($root == null) {
            return 0;
        }

        $left_depth = $this->maxDepth1($root->left);
        $right_depth = $this->maxDepth1($root->right);
        $depth = max($left_depth, $right_depth) + 1;
        return $depth;
    }

    /**
     * 利用队列+层次遍历计算深度
     * @param $root
     * @return int
     */
    function maxDepth2($root)
    {
        $depth = 0;
        if ($root == null) {
            return $depth;
        }

        $queue = [];
        array_push($queue, $root);
        while (!empty($queue)) {
            $level_len = count($queue);
            for ($i = 0; $i < $level_len; $i++) {
                $curr = array_shift($queue);
                if ($curr->left != null) {
                    array_push($queue, $curr->left);
                }
                if ($curr->right != null) {
                    array_push($queue, $curr->right);
                }
            }
            $depth++;
        }

        return $depth;
    }
}


$a = new BinaryTreeNode(1);
$b = new BinaryTreeNode(2);
$c = new BinaryTreeNode(3);
$d = new BinaryTreeNode(4);
$e = new BinaryTreeNode(5);
$f = new BinaryTreeNode(6);

$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, null);

$solution = new Solution();
var_dump($solution->maxDepth1($a));
var_dump($solution->maxDepth2($a));
