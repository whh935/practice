<?php
/**
 * User: whh935
 * Date: 2020/3/29 17:48
 * Desc: LeetCode第145题-https://leetcode-cn.com/problems/binary-tree-postorder-traversal/
 *      给定一个二叉树，返回它的 后序 遍历。
 *      输入: [1,null,2,3]
 *      1
 *       \
 *        2
 *       /
 *      3
 *      输出: [3,2,1]
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
     * 借助先序遍历的思路，得到根>右>左，再翻转一次
     * 利用栈后序遍历二叉树
     * @param $root
     * @return array
     */
    function postorderTraversal($root)
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
                $curr = $curr->right;
            }

            $node = array_pop($stack);//此时该节点的右子树已经全部遍历完
            $curr = $node->left;//对左子树遍历
        }

        $result = array_reverse($result);
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
$result = $solution->postorderTraversal($a);
var_dump($result);