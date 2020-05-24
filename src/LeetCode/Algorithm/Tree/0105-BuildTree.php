<?php
/**
 * User: whh935
 * Date: 2020/4/26 11:17
 * Desc: 从前序与中序遍历序列构造二叉树-https://leetcode-cn.com/problems/construct-binary-tree-from-preorder-and-inorder-traversal/
 *      根据一棵树的前序遍历与中序遍历构造二叉树。
 *      注意:
 *          你可以假设树中没有重复的元素。
 *      例如，给出
 *          前序遍历 preorder = [3,9,20,15,7]
 *          中序遍历 inorder = [9,3,15,20,7]
 *      返回如下的二叉树：
 *              3
 *             / \
 *            9  20
 *              /  \
 *             15   7
 */

class BinaryTreeNode
{
    public $val = null;
    public $left = null;
    public $right = null;

    /**
     * BinaryTreeNode constructor.
     * @param $value
     */
    function __construct($value)
    {
        $this->val = $value;
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
     * @param $pre_order
     * @param $in_order
     * @return BinaryTreeNode|null
     */
    function reBuildTree($pre_order, $in_order)
    {
        if (empty($pre_order) || empty($in_order)) {
            return null;
        }

        return $this->reBuildTreeCore(
            $pre_order, 0, count($pre_order) - 1,
            $in_order, 0, count($in_order) - 1
        );
    }

    /**
     * @param $pre_order
     * @param $pre_order_start
     * @param $pre_order_end
     * @param $in_order
     * @param $in_order_start
     * @param $in_order_end
     * @return BinaryTreeNode
     */
    function reBuildTreeCore($pre_order, $pre_order_start, $pre_order_end,
                             $in_order, $in_order_start, $in_order_end)
    {
        if ($pre_order_start > $pre_order_end || $in_order_start > $in_order_end) {
            return null;
        }

        //前序遍历的第一个元素就是根节点
        $root = new BinaryTreeNode($pre_order[$pre_order_start]);

        //根节点在中序遍历中的位置
        $root_index = array_search($root->val, $in_order);

        $left_length = $root_index - $in_order_start;
        $pre_order_left_start = $pre_order_start + 1;
        $pre_order_right_start = $pre_order_start + $left_length + 1;

        //建立节点的左子树
        $root->left = $this->reBuildTreeCore(
            $pre_order, $pre_order_left_start, $pre_order_start + $left_length,
            $in_order, $in_order_start, $root_index - 1
        );

        //建立节点的右子树
        $root->right = $this->reBuildTreeCore(
            $pre_order, $pre_order_right_start, $pre_order_end,
            $in_order, $root_index + 1, $in_order_end
        );

        return $root;
    }
}

$solution = new Solution();
$pre_order = [3,9,20,15,7];
$in_order = [9,3,15,20,7];
$root = $solution->reBuildTree($pre_order, $in_order);
$root->preOrderByRecursive($root);
