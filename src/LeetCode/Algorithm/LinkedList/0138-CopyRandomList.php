<?php
/**
 * User: whh935
 * Date: 2020/5/12 10:01
 * Desc: 复制带随机指针的链表-https://leetcode-cn.com/problems/copy-list-with-random-pointer/
 *      给定一个链表，每个节点包含一个额外增加的随机指针，该指针可以指向链表中的任何节点或空节点。
 *      要求返回这个链表的 深拷贝。 
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
     * @return mixed
     */
    function copyRandomList($head)
    {
        if ($head == null) {
            return $head;
        }

        //将克隆结点放在原结点后面 1->2->3  ==>  1->1'->2->2'->3->3'
        $node = $head;
        while ($node != null) {
            $clone = new ListNode($node->val);
            $clone->next = $node->next;
            $node->next = $clone;
            $node = $clone->next;
        }

        //处理random
        $node = $head;
        while ($node != null) {
            $node->next->random = ($node->random == null) ? null : $node->random->next;
            $node = $node->next->next;
        }

        //分离原链表和克隆链表
        $node = $head;
        $clone_head = $head->next;
        while ($node->next != null) {
            $tmp = $node->next;
            $node->next = $node->next->next;
            $node = $tmp;
        }

        return $clone_head;
    }
}