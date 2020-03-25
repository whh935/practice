<?php
/**
 * User: whh935
 * Date: 2020/3/8 23:19
 * Desc: 剑指offer面试题6
 *      输入某二叉树的前序遍历和中序遍历的结果，请重建该二叉树。
 *      假设输入的前序遍历和中序遍历的结果中都不含重复的数字。
 *      如：前序遍历 pre_order = [3,9,20,15,7]，中序遍历 in_order = [9,3,15,20,7]
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
}

/**
 * @param $pre_order
 * @param $in_order
 * @return null
 */
function reBuildTree($pre_order, $in_order)
{
    if (empty($pre_order) || empty($in_order)) {
        return null;
    }

    return reBuildTreeCore(
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
    //前序遍历的第一个元素就是根节点
    $root_val = $pre_order[0];
    $root = new BinaryTreeNode($root_val);

    //递归终止条件，如果start==end，证明是最后1个元素，应该返回节点
    if ($pre_order_start == $pre_order_end || $in_order_start == $in_order_end) {
        return $root;
    }

    //根节点在中序遍历中的位置
    $root_index = array_search($root_val, $in_order);

    //中序遍历的左子树+右子树
    $in_order_left  = array_slice($in_order, 0, $root_index);
    $in_order_right = array_slice($in_order, $root_index + 1);

    //先序遍历的左子树+右子树
    $pre_order_left  = array_slice($pre_order, 1, $root_index);
    $pre_order_right = array_slice($pre_order, $root_index + 1);

    //建立节点的左子树
    if (!empty($pre_order_left) && !empty($in_order_left)) {
        $root->left = reBuildTreeCore(
            $pre_order_left, 0, count($pre_order_left) - 1,
            $in_order_left, 0, count($in_order_left) - 1
        );
    }

    //建立节点的右子树
    if (!empty($pre_order_right) && !empty($in_order_right)) {
        $root->right = reBuildTreeCore(
            $pre_order_right, 0, count($pre_order_right) - 1,
            $in_order_right, 0, count($in_order_right) - 1
        );
    }

    return $root;
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

$pre_order = [3,9,20,15,7];
$in_order = [9,3,15,20,7];
$root = reBuildTree($pre_order, $in_order);
preOrderByRecursive($root);
echo PHP_EOL;