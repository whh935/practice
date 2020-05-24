<?php
/**
 * User: whh935
 * Date: 2020/4/24 17:04
 * Desc: 两两交换链表中的节点-https://leetcode-cn.com/problems/swap-nodes-in-pairs/
 *      给定一个链表，两两交换其中相邻的节点，并返回交换后的链表。
 *      你不能只是单纯的改变节点内部的值，而是需要实际的进行节点交换。
 *      示例：给定 1->2->3->4, 你应该返回 2->1->4->3.
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
     * @param $head
     * @return mixed
     */
    function swapPairs1($head)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $next = $head->next;
        
        $head->next = $this->swapPairs1($next->next);
        $next->next = $head;

        return $next;
    }

    /**
     * @param $head
     * @return null
     */
    function swapPairs2($head)
    {
        $dummy = new ListNode(-1);
        $dummy->next = $head;

        $prev = $dummy;
        while ($head != null && $head->next != null) {
            $first = $head;
            $second = $head->next;

            $prev->next = $second;
            $first->next = $second->next;
            $second->next = $first;

            $prev = $first;
            $head = $first->next;
        }

        return $dummy->next;
    }
}

$head = new ListNode(null);
$node1 = new ListNode(1);
$node2 = new ListNode(2);
$node3 = new ListNode(3);
$node4 = new ListNode(4);

$head->addNode($head, $node1);
$head->addNode($head, $node2);
$head->addNode($head, $node3);
$head->addNode($head, $node4);
$head->showNode($head->next);

$solution = new Solution();
//$swap1 = $solution->swapPairs1($head->next);
//$head->showNode($swap1);

$swap2 = $solution->swapPairs2($head->next);
$head->showNode($swap2);
