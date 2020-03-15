<?php
/**
 * User: whh935
 * Date: 2020/3/8 23:19
 * Desc: 剑指offer面试题39
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
}

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

    $depth = max(getDepth($root->left), getDepth($root->right)) + 1;
    return $depth;
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

var_dump(getDepth($a));
echo PHP_EOL;