<?php
/**
 * User: whh935
 * Date: 2020/3/28 23:34
 * Desc: LeetCode第21题-https://leetcode-cn.com/problems/merge-two-sorted-lists/
 *      将两个升序链表合并为一个新的升序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
 *      输入：1->2->4, 1->3->4
 *      输出：1->1->2->3->4->4
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

    function addNode($head, $value)
    {
        $p = $head;
        while (!is_null($p->next)) {
            $p = $p->next;
        }

        $new     = new ListNode($value);
        $p->next = $new;
    }

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
     * @param $l1
     * @param $l2
     * @return ListNode
     */
    function mergeTwoLists($l1, $l2)
    {
        $result = new ListNode(null);
        $curr = $result;
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
        return $result->next;
    }
}

$l1 = new ListNode(null);
$l1->addNode($l1, 1);
$l1->addNode($l1, 2);
$l1->addNode($l1, 4);

$l2 = new ListNode(null);
$l2->addNode($l2, 1);
$l2->addNode($l2, 3);
$l2->addNode($l2, 4);

$solution = new Solution();
$merge = $solution->mergeTwoLists($l1->next, $l2->next);
$merge->showNode($merge);
