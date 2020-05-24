<?php
/**
 * User: whh935
 * Date: 2020/5/13 08:02
 * Desc: 二叉树的锯齿形层次遍历-https://leetcode-cn.com/problems/binary-tree-zigzag-level-order-traversal/
 *      给定一个二叉树，返回其节点值的锯齿形层次遍历。
 *      （即先从左往右，再从右往左进行下一层遍历，以此类推，层与层之间交替进行）。
 *      给定二叉树: [3,9,20,null,null,15,7],
 *          3
 *         / \
 *        9  20
 *          /  \
 *         15   7
 *      返回其层次遍历结果：
 *      [
 *          [3],
 *          [20,9],
 *          [15,7]
 *      ]
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
    function zigzagLevelOrder($root)
    {
        $levels = [];
        if ($root == null) {
            return $levels;
        }

        $level = 0;
        $queue = [];
        array_push($queue, $root);
        while (!empty($queue)) {
            $level_len = count($queue);
            $curr_levels = [];
            for ($i = 0; $i < $level_len; $i++) {
                $curr = array_shift($queue);
                $curr_levels[] = $curr->val;

                $curr->left != null && array_push($queue, $curr->left);
                $curr->right != null && array_push($queue, $curr->right);
            }

            $level % 2 != 0 && $curr_levels = array_reverse($curr_levels);
            $levels[$level++] = $curr_levels;
        }

        return $levels;
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
print_r(json_encode($solution->zigzagLevelOrder($a)));
echo PHP_EOL;