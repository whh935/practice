<?php
/**
 * User: whh935
 * Date: 2020/3/8 23:19
 * Desc: 剑指offer面试题55-I-https://leetcode-cn.com/problems/er-cha-shu-de-shen-du-lcof/
 *      输入一棵二叉树的根节点，求该树的深度。
 *      从根节点到叶节点依次经过的节点（含根、叶节点）形成树的一条路径，最长路径的长度为树的深度
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
     * 递归计算二叉树深度
     * @param $root
     * @return int|mixed
     */
    function getDepth($root)
    {
        if (is_null($root)) {
            return 0;
        }

        $depth = max($this->getDepth($root->left), $this->getDepth($root->right)) + 1;
        return $depth;
    }
}

$a = new BinaryTreeNode('A');
$b = new BinaryTreeNode('B');
$c = new BinaryTreeNode('C');
$d = new BinaryTreeNode('D');
$e = new BinaryTreeNode('E');
$f = new BinaryTreeNode('F');
$g = new BinaryTreeNode('G');
$h = new BinaryTreeNode('H');
$i = new BinaryTreeNode('I');

$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, $g);
$e->buildTree($h, $i);

$a->preOrderByRecursive($a);
echo PHP_EOL;

$solution = new Solution();
var_dump($solution->getDepth($a));
