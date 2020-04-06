<?php
/**
 * User: whh935
 * Date: 2020/3/28 22:24
 * Desc: LeetCode第206题-https://leetcode-cn.com/problems/reverse-linked-list/
 *      反转一个单链表。
 *      输入: 1->2->3->4->5->NULL
 *      输出: 5->4->3->2->1->NULL
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
     * head为首元素节点
     * @param $head
     * @return ListNode
     */
    function reverseList1($head)
    {
        $prev = null;  // 前指针节点
        $curr = $head; // 当前指针节点
        while ($curr != null) {
            $next = $curr->next; // 临时节点，暂存当前节点的下一节点，用于后移
            $curr->next = $prev; // 把当前节点的指针指向前一个节点
            $prev = $curr; // 前指针后移
            $curr = $next; // 当前指针后移
        }

        return $prev;
    }

    /**
     * 在思考递归问题的时候，我们要从上到下思考：
     * 1.子问题是什么
     * 2.base case是什么
     * 3.在当前层要干什么
     *      对翻转链表来说，以1->2->3->4->5为例：
     * 4.子问题是：除去current node，翻转剩余链表，即除去1, reverseList(2->3->4->5)，递归得到的解是 5->4->3->2
     * 5.base case：当前节点为空，返回空，当前节点的next为空（只剩余一个节点），返回该节点
     * 6.在当前层要干什么：翻转链表，即把1->2变为2->1.
     *      最后return的是结果链表的头，也就是递归解的头。
     * @param $head
     * @return ListNode
     */
    function reverseList2($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $curr = $this->reverseList2($head->next);
        $head->next->next = $head;
        $head->next = null;

        return $curr;
    }
}

$head = new ListNode(null);
$head->addNode($head, 1);
$head->addNode($head, 2);
$head->addNode($head, 3);
$head->addNode($head, 4);
$head->addNode($head, 5);
$head->showNode($head->next);

$solution = new Solution();
//$reverse_head = $solution->reverseList1($head->next);
//$reverse_head->showNode($reverse_head);

$reverse_head = $solution->reverseList2($head->next);
$reverse_head->showNode($reverse_head);
