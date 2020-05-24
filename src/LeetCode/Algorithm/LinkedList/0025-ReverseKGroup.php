<?php
/**
 * User: whh935
 * Date: 2020/5/16 22:06
 * Desc: K 个一组翻转链表-https://leetcode-cn.com/problems/reverse-nodes-in-k-group/
 *      给你一个链表，每 k 个节点一组进行翻转，请你返回翻转后的链表。
 *      k 是一个正整数，它的值小于或等于链表的长度。
 *      如果节点总数不是 k 的整数倍，那么请将最后剩余的节点保持原有顺序。
 *      示例：
 *          给你这个链表：1->2->3->4->5
 *          当 k = 2 时，应当返回: 2->1->4->3->5
 *          当 k = 3 时，应当返回: 3->2->1->4->5
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
     * 利用栈
     * @param $head
     * @param $k
     * @return null
     */
    function reverseKGroup($head, $k)
    {
        if ($head == null || $k == 1) {
            return $head;
        }

        $stack = new SplStack();
        $dummy = new ListNode(0);
        $pre = $dummy;
        while (true) {
            $count = 0;
            $tmp = $head;
            while ($tmp !== null && $count < $k) {
                $stack->push($tmp);
                $tmp = $tmp->next;
                $count++;
            }

            if ($count != $k) {
                $pre->next = $head;
                break;
            }

            while (!$stack->isEmpty()) {
                $pre->next = $stack->pop();
                $pre = $pre->next;
            }

            $pre->next = $tmp;
            $head = $tmp;
        }

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
$k = 3;
$ans = $solution->reverseKGroup($head->next, $k);
$head->showNode($ans);
