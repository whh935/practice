<?php
/**
 * User: whh935
 * Date: 2020/5/13 08:59
 * Desc: 二叉树的层平均值-https://leetcode-cn.com/problems/average-of-levels-in-binary-tree/
 *      给定一个非空二叉树, 返回一个由每层节点平均值组成的数组.
 *      示例 1:
 *          输入:
 *              3
 *             / \
 *            9  20
 *              /  \
 *             15   7
 *          输出: [3, 14.5, 11]
 *          解释:
 *          第0层的平均值是 3,  第1层是 14.5, 第2层是 11. 因此返回 [3, 14.5, 11].
 *      注意：
 *          节点值的范围在32位有符号整数范围内。
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
     * @param $root
     * @return array
     */
    function averageOfLevels($root)
    {
        $ans = [];
        if ($root == null) {
            return $ans;
        }

        $queue = [];
        array_push($queue, $root);
        while (!empty($queue)) {
            $curr_level_len = count($queue);
            $curr_level_sum = 0;
            for ($i = 0; $i < $curr_level_len; $i++) {
                $curr = array_shift($queue);
                $curr_level_sum += $curr->val;

                if ($curr->left != null) {
                    array_push($queue, $curr->left);
                }
                if ($curr->right != null) {
                    array_push($queue, $curr->right);
                }
            }
            $ans[] = $curr_level_sum / $curr_level_len;
        }

        return $ans;
    }
}

$a = new BinaryTreeNode(3);
$b = new BinaryTreeNode(9);
$c = new BinaryTreeNode(20);
$d = new BinaryTreeNode(15);
$e = new BinaryTreeNode(7);

$a->buildTree($b, $c);
$c->buildTree($d, $e);

$solution = new Solution();
print_r(json_encode($solution->averageOfLevels($a)));
