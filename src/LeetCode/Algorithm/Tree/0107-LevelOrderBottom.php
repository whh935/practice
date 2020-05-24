<?php
/**
 * User: whh935
 * Date: 2020/4/6 23:16
 * Desc: 二叉树的层次遍历 II-https://leetcode-cn.com/problems/binary-tree-level-order-traversal-ii/
 *      给定一个二叉树，返回其按层次遍历的节点值。 （即逐层地，从左到右访问所有节点）。
 *      给定二叉树: [3,9,20,null,null,15,7],
 *          3
 *         / \
 *        9  20
 *          /  \
 *         15   7
 *      返回其自底向上的层次遍历为：
 *      [
 *          [15,7],
 *          [9,20],
 *          [3]
 *      ]
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
     * 利用队列实现层次遍历
     * @param $root
     * @return array
     */
    function levelOrderBottom($root)
    {
        $levels = [];
        if ($root == null) {
            return $levels;
        }

        $level = 0;
        $queue = [];
        array_push($queue, $root);
        while (!empty($queue)) {
            $level_len = count($queue);
            for ($i = 0; $i < $level_len; $i++) {
                $curr = array_shift($queue);
                $levels[$level][] = $curr->val;

                if ($curr->left != null) {
                    array_push($queue, $curr->left);
                }
                if ($curr->right != null) {
                    array_push($queue, $curr->right);
                }
            }
            $level++;
        }

        return array_reverse($levels);
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
print_r(json_encode($solution->levelOrderBottom($a)));
