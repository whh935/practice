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
 * 先序遍历-通过栈
 * @param $root
 */
function preOrderByStack($root)
{
    $stack = array();
    array_push($stack, $root);
    while (!empty($stack)) {
        $node = array_pop($stack);
        echo $node->val . ' ';
        if (!is_null($node->right)) {
            array_push($stack, $node->right);
        }
        if (!is_null($node->left)) {
            array_push($stack, $node->left);
        }
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
 * 中序遍历-通过栈
 * @param $root
 */
function inOrderByStack($root)
{
    $stack = array();
    $node  = $root;
    while (!empty($stack) || !is_null($node)) {
        while (!is_null($node)) {
            array_push($stack, $node);
            $node = $node->left;
        }
        $node = array_pop($stack);
        echo $node->val . ' ';

        $node = $node->right;
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

/**
 * 后序遍历-通过栈
 * @param $root
 */
function postOrderByStack($root)
{
    $stack     = array();
    $out_stack = array();
    array_push($stack, $root);
    while (!empty($stack)) {
        $node = array_pop($stack);
        array_push($out_stack, $node);//最先压入根节点，最后输出
        if (!is_null($node->left)) {
            array_push($stack, $node->left);
        }

        if (!is_null($node->right)) {
            array_push($stack, $node->right);
        }
    }

    while (!empty($out_stack)) {
        $node = array_pop($out_stack);
        echo $node->val . ' ';
    }
}

/**
 * 获取二叉树的层级/高度
 * @param $root
 * @return int|mixed
 */
function getDepth($root)
{
    if (is_null($root)) {
        return 0;
    }

    $left  = getDepth($root->left);
    $right = getDepth($root->right);
    $level = max($left, $right) + 1;
    return $level;
}

/**
 * 利用队列层次遍历二叉树
 * @param $root
 */
function levelOrder1($root)
{
    if (is_null($root)) {
        return ;
    }

    $queue = [];
    array_push($queue, $root);
    while (!empty($queue)) {
        $node = array_shift($queue);
        echo $node->val . ' ';

        if (!is_null($node->left)) {
            array_push($queue, $node->left);
        }

        if (!is_null($node->right)) {
            array_push($queue, $node->right);
        }
    }
}

/**
 * @param $root
 * @return array
 */
function levelOrder2($root)
{
    if (is_null($root)) {
        return [];
    }

    $queue  = [];
    $result = [];
    array_push($queue, $root);
    while (!empty($queue)) {
        $node = array_shift($queue);
        $result[] = $node->val;
        if (!is_null($node->left)) {
            array_push($queue, $node->left);
        }
        if (!is_null($node->right)) {
            array_push($queue, $node->right);
        }
    }

    return $result;
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
preOrderByStack($a);
echo PHP_EOL;

inOrderByRecursive($a);
echo PHP_EOL;
inOrderByStack($a);
echo PHP_EOL;

postOrderByRecursive($a);
echo PHP_EOL;
postOrderByStack($a);
echo PHP_EOL;

var_dump(getDepth($a));
echo PHP_EOL;

levelOrder1($a);
echo PHP_EOL;
var_dump(levelOrder2($a));
echo PHP_EOL;
