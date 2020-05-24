<?php
/**
 * User: whh935
 * Date: 2020/5/18 22:48
 * Desc: 求根到叶子节点数字之和-https://leetcode-cn.com/problems/sum-root-to-leaf-numbers/
 *      给定一个二叉树，它的每个结点都存放一个 0-9 的数字，每条从根到叶子节点的路径都代表一个数字。
 *      例如，从根到叶子节点路径 1->2->3 代表数字 123。
 *      计算从根到叶子节点生成的所有数字之和。
 *      说明: 叶子节点是指没有子节点的节点。
 *      示例 1:
 *          输入: [1,2,3]
 *              1
 *             / \
 *            2   3
 *          输出: 25
 *          解释:
 *          从根到叶子节点路径 1->2 代表数字 12.
 *          从根到叶子节点路径 1->3 代表数字 13.
 *          因此，数字总和 = 12 + 13 = 25.
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
     * @return int
     */
    function sumNumbers($root)
    {
        return $this->dfs($root, 0);
    }

    /**
     * @param $root
     * @param $sum
     * @return int
     */
    function dfs($root, $sum)
    {
        if ($root == null) {
            return 0;
        }
        if ($root->left == null && $root->right == null) {
            return 10 * $sum + $root->val;
        }

        return $this->dfs($root->left, 10 * $sum + $root->val) +
            $this->dfs($root->right, 10 * $sum + $root->val);
    }
}

$a = new BinaryTreeNode(1);
$b = new BinaryTreeNode(2);
$c = new BinaryTreeNode(3);

$a->buildTree($b, $c);

$a->preOrderByRecursive($a);
echo PHP_EOL;

$solution = new Solution();
var_dump($solution->sumNumbers($a));
