<?php
/**
 * User: whh935
 * Date: 2020/4/12 16:48
 * Desc: LeetCode第160题-https://leetcode-cn.com/problems/intersection-of-two-linked-lists/
 *      相交链表
 *      编写一个程序，找到两个单链表相交的起始节点。
 *         4->1->
 *               8->4->5
 *      5->0->1->
 *      第一个相交节点是8
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

    function addNode($head, $node)
    {
        $p = $head;
        while (!is_null($p->next)) {
            $p = $p->next;
        }

        $p->next = $node;
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
     * @param $headA
     * @param $headB
     * @return null
     */
    function getIntersectionNode($headA, $headB)
    {
        if ($headA == null || $headB == null) {
            return null;
        }

        $pA = $headA;
        $pB = $headB;
        while ($pA !== $pB) {
            $pA = $pA == null ? $headB : $pA->next;
            $pB = $pB == null ? $headA : $pB->next;
        }

        return $pA;
    }
}

$common_node1 = new ListNode(8);
$common_node2 = new ListNode(4);
$common_node3 = new ListNode(5);

$headA = new ListNode(null);
$nodeA1 = new ListNode(4);
$nodeA2 = new ListNode(1);
$headA->addNode($headA, $nodeA1);
$headA->addNode($headA, $nodeA2);
$headA->addNode($headA, $common_node1);
$headA->addNode($headA, $common_node2);
$headA->addNode($headA, $common_node3);
$headA->showNode($headA->next);

$headB = new ListNode(null);
$nodeB1 = new ListNode(5);
$nodeB2 = new ListNode(0);
$nodeB3 = new ListNode(1);
$headB->addNode($headB, $nodeB1);
$headB->addNode($headB, $nodeB2);
$headB->addNode($headB, $nodeB3);
$headB->addNode($headB, $common_node1);
$headB->showNode($headB->next);

$solution = new Solution();
var_dump($solution->getIntersectionNode($headA->next, $headB->next));
