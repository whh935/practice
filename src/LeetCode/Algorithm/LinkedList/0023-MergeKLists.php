<?php
/**
 * User: whh935
 * Date: 2020/5/16 22:03
 * Desc: 合并K个排序链表-https://leetcode-cn.com/problems/merge-k-sorted-lists/
 *      合并 k 个排序链表，返回合并后的排序链表。请分析和描述算法的复杂度。
 *      示例:
 *          输入:
 *          [
 *              1->4->5,
 *              1->3->4,
 *              2->6
 *          ]
 *          输出: 1->1->2->3->4->4->5->6
 */

class ListNode
{
    public $val = '';
    public $next  = null;

    /**
     * ListNode constructor.
     * @param $val
     */
    public function __construct($val)
    {
        $this->val = $val;
    }

    /**
     * @param $head
     * @param $value
     */
    function addNode($head, $value)
    {
        $p = $head;
        while (!is_null($p->next)) {
            $p = $p->next;
        }

        $new     = new ListNode($value);
        $p->next = $new;
    }

    /**
     * @param $head
     */
    function showNode($head)
    {
        $p = $head;
        while (!is_null($p)) {
            echo $p->val . '->';
            $p = $p->next;
        }
        echo 'NULL' . PHP_EOL;
    }
}

class Solution
{
    /**
     * @param $lists
     * @return ListNode
     */
    function mergeKLists($lists)
    {
        $length = count($lists);
        if ($length == 0) {
            return null;
        }

        return $this->merge($lists, 0, $length - 1);
    }

    /**
     * @param $lists
     * @param $left
     * @param $right
     * @return null
     */
    function merge($lists, $left, $right)
    {
        if ($left == $right) {
            return $lists[$left];
        }

        $mid = $left + intval(($right - $left) / 2);
        $l1 = $this->merge($lists, $left, $mid);
        $l2 = $this->merge($lists, $mid + 1, $right);

        return $this->mergeTwoLists($l1, $l2);
    }

    /**
     * @param $l1
     * @param $l2
     * @return null
     */
    function mergeTwoLists($l1, $l2)
    {
        $dummy_head = new ListNode(0);
        $curr = $dummy_head;
        while ($l1 != null && $l2 != null) {
            if ($l1->val <= $l2->val) {
                $curr->next = $l1;
                $l1 = $l1->next;
            } else {
                $curr->next = $l2;
                $l2 = $l2->next;
            }
            $curr = $curr->next;
        }

        $curr->next = ($l1 != null) ? $l1 : $l2;
        return $dummy_head->next;
    }
}

$l1 = new ListNode(null);
$l1->addNode($l1, 1);
$l1->addNode($l1, 4);
$l1->addNode($l1, 5);

$l2 = new ListNode(null);
$l2->addNode($l2, 1);
$l2->addNode($l2, 3);
$l2->addNode($l2, 4);

$l3 = new ListNode(null);
$l3->addNode($l3, 2);
$l3->addNode($l3, 6);

$solution = new Solution();
$lists = [$l1->next, $l2->next, $l3->next];
$k_merge = $solution->mergeKLists($lists);
$k_merge->showNode($k_merge);
