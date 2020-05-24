<?php
/**
 * User: whh935
 * Date: 2020/4/24 16:22
 * Desc: 删除链表的倒数第N个节点-https://leetcode-cn.com/problems/remove-nth-node-from-end-of-list/
 *      给定一个链表，删除链表的倒数第 n 个节点，并且返回链表的头结点。
 *      示例：给定一个链表: 1->2->3->4->5, 和 n = 2.
 *      当删除了倒数第二个节点后，链表变为 1->2->3->5.
 *      说明：给定的 n 保证是有效的。
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
     * @param $node
     */
    function addNode($head, $node)
    {
        $p = $head;
        while (!is_null($p->next)) {
            $p = $p->next;
        }

        $p->next = $node;
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
     * 双指针
     * @param $head
     * @param $n
     * @return null
     */
    function removeNthFromEnd($head, $n)
    {
        $dummy = new ListNode(-1);
        $dummy->next = $head;

        $first = $dummy;
        $second = $dummy;
        for ($i = 1; $i <= $n + 1; $i++) {
            $first = $first->next;
        }

        while ($first != null) {
            $first = $first->next;
            $second = $second->next;
        }

        $second->next = ($second->next)->next;
        return $dummy->next;
    }
}

$head = new ListNode(null);
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);
$node5 = new ListNode(5);

$head->addNode($head, $node1);
$head->addNode($head, $node2);
$head->addNode($head, $node3);
$head->addNode($head, $node4);
$head->addNode($head, $node5);
$head->showNode($head->next);

$solution = new Solution();
$n = 2;
$res = $solution->removeNthFromEnd($head->next, $n);
$head->showNode($res);
