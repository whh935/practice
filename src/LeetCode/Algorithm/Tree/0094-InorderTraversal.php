<?php
/**
 * User: whh935
 * Date: 2020/3/29 15:04
 * Desc: 二叉树的中序遍历-https://leetcode-cn.com/problems/binary-tree-inorder-traversal/
 *      给定一个二叉树，返回它的 中序 遍历。
 *      输入: [1,null,2,3]
 *          1
 *           \
 *            2
 *           /
 *          3
 *      输出: [1,3,2]
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
     * 利用栈中序遍历二叉树，与前序遍历不同的是，出栈时才将结果写入列表
     * @param $root
     * @return array
     */
    function inorderTraversal($root)
    {
        if ($root == null) {
            return [];
        }

        $result = [];
        $stack = [];
        $curr = $root;
        while (!empty($stack) || $curr != null) {
            while ($curr != null) {
                array_push($stack, $curr);
                $curr = $curr->left;
            }

            $node = array_pop($stack);//此时左子树遍历完成
            $result[] = $node->val;//将根节点加入列表

            $curr = $node->right;//遍历右子树
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
$result = $solution->inorderTraversal($a);
var_dump($result);
