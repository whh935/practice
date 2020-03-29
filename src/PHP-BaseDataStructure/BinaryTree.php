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
}

/**
 * 先序遍历-递归
 * @param $root
 */
function preOrderByRecursive($root)
{
    if (!is_null($root)) {
        echo $root->val . ' ';
        preOrderByRecursive($root->left);
        preOrderByRecursive($root->right);
    }
}

/**
 * 中序遍历-递归
 * @param $root
 */
function inOrderByRecursive($root)
{
    if (!is_null($root)) {
        inOrderByRecursive($root->left);
        echo $root->val . ' ';
        inOrderByRecursive($root->right);
    }
}

/**
 * 后序遍历-递归
 * @param $root
 */
function postOrderByRecursive($root)
{
    if (!is_null($root)) {
        postOrderByRecursive($root->left);
        postOrderByRecursive($root->right);
        echo $root->val . ' ';
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

preOrderByRecursive($a);
echo PHP_EOL;

inOrderByRecursive($a);
echo PHP_EOL;

postOrderByRecursive($a);
echo PHP_EOL;
