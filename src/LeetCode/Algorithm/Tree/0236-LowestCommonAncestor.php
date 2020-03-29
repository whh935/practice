<?php
/**
 * User: whh935
 * Date: 2020/3/29 22:58
 * Desc: LeetCode第236题-https://leetcode-cn.com/problems/lowest-common-ancestor-of-a-binary-tree/
 *      给定一个二叉树, 找到该树中两个指定节点的最近公共祖先。
 *      百度百科中最近公共祖先的定义为：“对于有根树 T 的两个结点 p、q，
 *      最近公共祖先表示为一个结点 x，满足 x 是 p、q 的祖先且 x 的深度尽可能大（一个节点也可以是它自己的祖先）。”
 *      例如，给定如下二叉树:  root = [3,5,1,6,2,0,8,null,null,7,4]
 *               3
 *            /     \
 *           5       1
 *          / \     / \
 *         6   2   0   8
 *            / \
 *           7   4
 *      输入: root = [3,5,1,6,2,0,8,null,null,7,4], p = 5, q = 1
 *      输出: 3
 *      解释: 节点 5 和节点 1 的最近公共祖先是节点 3。
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
 * 临界条件：最近公共祖先为根节点
 *      根节点是空节点
 *      根节点是q节点
 *      根节点是p节点
 * 根据临界条件
 *  此题相当于查找以 root 为根节点的树上是否有p节点或者q节点
 *      有，返回p节点或q节点
 *      无，返回null
 * 求解
 *  从左右子树分别进行递归，即查找左右子树上是否有p节点或者q节点
 *      左右子树均无p节点或q节点
 *      左子树找到，右子树没有找到，返回左子树的查找结果
 *      右子树找到，左子树没有找到，返回右子树的查找结果
 *      左、右子树均能找到
 *          说明此时的p节点和q节点在当前root节点两侧，返回root节点
 */
/**
 * @param $root
 * @param $p
 * @param $q
 * @return mixed
 */
function lowestCommonAncestor($root, $p, $q)
{
    if ($root == null || $root->val == $p || $root->val == $q) {
        return $root;
    }

    $left = lowestCommonAncestor($root->left, $p, $q);
    $right = lowestCommonAncestor($root->right, $p, $q);
    if ($left != null && $right != null) {
        return $root;
    }

    return $left != null ? $left : $right;
}

$a = new BinaryTreeNode(3);
$b = new BinaryTreeNode(5);
$c = new BinaryTreeNode(1);
$d = new BinaryTreeNode(6);
$e = new BinaryTreeNode(2);
$f = new BinaryTreeNode(0);
$g = new BinaryTreeNode(8);
$h = new BinaryTreeNode(7);
$i = new BinaryTreeNode(4);

$a->buildTree($b, $c);
$b->buildTree($d, $e);
$c->buildTree($f, $g);
$e->buildTree($h, $i);

$p = 5;
$q = 1;
$node = lowestCommonAncestor($a, $p, $q);
var_dump($node->val);
