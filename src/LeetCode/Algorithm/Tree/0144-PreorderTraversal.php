<?php
/**
 * User: whh935
 * Date: 2020/3/29 14:31
 * Desc: LeetCode第144题-https://leetcode-cn.com/problems/binary-tree-preorder-traversal/
 *      给定一个二叉树，返回它的 前序 遍历。
 *      输入: [1,null,2,3]
 *          1
 *           \
 *            2
 *           /
 *          3
 *      输出: [1,2,3]
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
     * 利用栈前序遍历二叉树
     * @param $root
     * @return array
     */
    function preorderTraversal($root)
    {
        if ($root == null) {
            return [];
        }

        $result = [];
        $stack = [];//辅助栈
        $curr = $root;//当前节点
        while (!empty($stack) || $curr != null) {
            while ($curr != null) {//遍历到最后一层
                $result[] = $curr->val;
                array_push($stack, $curr);
                $curr = $curr->left;
            }

            $node = array_pop($stack);//此时该节点的左子树已经全部遍历完
            $curr = $node->right;//对右子树遍历
        }

        return $result;
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
$result = $solution->preorderTraversal($a);
var_dump($result);