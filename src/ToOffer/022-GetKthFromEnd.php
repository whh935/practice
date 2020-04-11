<?php
/**
 * User: whh935
 * Date: 2020/3/24 23:37
 * Desc: 剑指offer面试题22-https://leetcode-cn.com/problems/lian-biao-zhong-dao-shu-di-kge-jie-dian-lcof/
 *      输入一个链表，输出该链表中倒数第k个节点。为了符合大多数人的习惯，本题从1开始计数，即链表的尾节点是倒数第1个节点。
 *      例如，一个链表有6个节点，从头节点开始，它们的值依次是1、2、3、4、5、6。这个链表的倒数第3个节点是值为4的节点。
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
        while (!is_null($p->next)) {
            $p = $p->next;
            echo $p->val . '->';
        }
        echo 'NULL' . PHP_EOL;
    }
}

class Solution
{
    /**
     * 链表中倒数第K个节点
     * @param $head
     * @param $k
     * @return null
     */
    function getKthFromEnd($head, $k)
    {
        if (is_null($head) || $k == 0) {
            return null;
        }

        $ahead = $head;
        for ($i = 0; $i < $k - 1; $i++) {
            if (!is_null($ahead->next)) {
                $ahead = $ahead->next;
            } else {
                return null;
            }
        }

        $behind = $head;
        while (!is_null($ahead->next)) {
            $ahead = $ahead->next;
            $behind = $behind->next;
        }

        return $behind;
    }
}

$head = new ListNode(null);
$head->addNode($head, 1);
$head->addNode($head, 2);
$head->addNode($head, 3);
$head->addNode($head, 4);
$head->addNode($head, 5);
$head->showNode($head);
echo PHP_EOL;

$solution = new Solution();
var_dump($solution->getKthFromEnd($head->next, 2));
