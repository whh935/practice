<?php
/**
 * User: whh935
 * Date: 2020/3/9 23:04
 * Desc: 剑指offer面试题27-https://leetcode-cn.com/problems/er-cha-shu-de-jing-xiang-lcof/
 *      请完成一个函数，输入一个二叉树，该函数输出它的镜像。
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
    function mirrorTree($root)
    {
        if ($root == null) {
            return null;
        }

        $right = $this->mirrorTree($root->left);
        $left = $this->mirrorTree($root->right);

        $root->right = $right;
        $root->left = $left;

        return $root;
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
$a_mirror = $solution->mirrorTree($a);
$a_mirror->preOrderByRecursive($a_mirror);
echo PHP_EOL;
