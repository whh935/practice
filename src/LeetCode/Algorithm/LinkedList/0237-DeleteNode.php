<?php
/**
 * User: whh935
 * Date: 2020/4/24 15:30
 * Desc: 删除链表中的节点-https://leetcode-cn.com/problems/delete-node-in-a-linked-list/
 *      请编写一个函数，使其可以删除某个链表中给定的（非末尾）节点，你将只被给定要求被删除的节点。
 *      示例1：
 *          输入: head = [4,5,1,9], node = 5
 *          输出: [4,1,9]
 *          解释: 给定你链表中值为 5 的第二个节点，那么在调用了你的函数之后，
 *              该链表应变为 4 -> 1 -> 9.
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
     * @param $node
     */
    function deleteNode($node)
    {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
    }
}

$head = new ListNode(null);
$node1 = new ListNode(4);
$node2 = new ListNode(5);
$node3 = new ListNode(1);
$node4 = new ListNode(9);

$head->addNode($head, $node1);
$head->addNode($head, $node2);
$head->addNode($head, $node3);
$head->addNode($head, $node4);
$head->showNode($head->next);

$solution = new Solution();
$solution->deleteNode($node2);
$head->showNode($head->next);
