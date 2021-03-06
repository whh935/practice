<?php
/**
 * User: whh935
 * Date: 2020/3/8 23:19
 * Desc: 剑指offer面试题32-I-https://leetcode-cn.com/problems/cong-shang-dao-xia-da-yin-er-cha-shu-lcof/
 *      从上到下打印出二叉树的每个节点，同一层的节点按照从左到右的顺序打印。
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
     * 利用队列层次遍历二叉树
     * @param $root
     * @return array
     */
    function levelOrder($root)
    {
        if (is_null($root)) {
            return [];
        }

        $queue = [];
        array_push($queue, $root);
        $ans = [];
        while (!empty($queue)) {
            $node = array_shift($queue);
            $ans[] = $node->val;

            if (!is_null($node->left)) {
                array_push($queue, $node->left);
            }
            if (!is_null($node->right)) {
                array_push($queue, $node->right);
            }
        }

        return $ans;
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
var_dump($solution->levelOrder($a));
echo PHP_EOL;
