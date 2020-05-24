<?php
/**
 * User: whh935
 * Date: 2020/5/16 22:56
 * Desc: 移除链表元素-https://leetcode-cn.com/problems/remove-linked-list-elements/
 *      删除链表中等于给定值 val 的所有节点。
 *      示例:
 *          输入: 1->2->6->3->4->5->6, val = 6
 *          输出: 1->2->3->4->5
 */

class ListNode
{
    public $val = '';
    public $next  = null;
    public $random = null;

    /**
     * ListNode constructor.
     * @param $val
     */
    public function __construct($val)
    {
        $this->val = $val;
        $this->next = null;
        $this->random = null;
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
     * @param $val
     * @return null
     */
    function removeElements($head, $val)
    {
        $dummy = new ListNode(-1);
        $dummy->next = $head;

        $pre = $dummy;
        $curr = $head;
        while ($curr != null) {
            if ($curr->val == $val) {
                $pre->next = $curr->next;
            } else {
                $pre = $curr;
            }

            $curr = $curr->next;
        }

        return $dummy->next;
    }
}