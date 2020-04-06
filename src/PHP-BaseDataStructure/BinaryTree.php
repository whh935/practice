<?php
/**
 * User: whh935
 * Date: 2020/3/10 10:24
 * Desc: 二叉树
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

    /**
     * 先序遍历-递归
     * @param $root
     */
    public function preOrderByRecursive($root)
    {
        if (!is_null($root)) {
            echo $root->val . ' ';
            $this->preOrderByRecursive($root->left);
            $this->preOrderByRecursive($root->right);
        }
    }

    /**
     * 中序遍历-递归
     * @param $root
     */
    public function inOrderByRecursive($root)
    {
        if (!is_null($root)) {
            $this->inOrderByRecursive($root->left);
            echo $root->val . ' ';
            $this->inOrderByRecursive($root->right);
        }
    }

    /**
     * 后序遍历-递归
     * @param $root
     */
    public function postOrderByRecursive($root)
    {
        if (!is_null($root)) {
            $this->postOrderByRecursive($root->left);
            $this->postOrderByRecursive($root->right);
            echo $root->val . ' ';
        }
    }
}

$a = new BinaryTreeNode(1);
$b = new BinaryTreeNode(2);
$c = new BinaryTreeNode(3);
$d = new BinaryTreeNode(4);
$e = new BinaryTreeNode(5);
$f = new BinaryTreeNode(6);
$g = new BinaryTreeNode(7);
$h = new BinaryTreeNode(8);
$i = new BinaryTreeNode(9);

$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, $g);
$e->buildTree($h, $i);

$a->preOrderByRecursive($a);
echo PHP_EOL;

$a->inOrderByRecursive($a);
echo PHP_EOL;

$a->postOrderByRecursive($a);
echo PHP_EOL;
