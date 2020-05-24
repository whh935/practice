<?php
/**
 * User: whh935
 * Date: 2020/5/17 23:14
 * Desc: 二进制链表转整数-https://leetcode-cn.com/problems/convert-binary-number-in-a-linked-list-to-integer/
 *      给你一个单链表的引用结点 head。链表中每个结点的值不是 0 就是 1。已知此链表是一个整数数字的二进制表示形式。
 *      请你返回该链表所表示数字的 十进制值 。
 *      示例 1：
 *          输入：head = [1,0,1]
 *          输出：5
 *          解释：二进制数 (101) 转化为十进制数 (5)
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
     * @return int
     */
    function getDecimalValue($head)
    {
        $curr = $head;
        $ans = 0;
        while ($curr != null) {
            $ans = $ans * 2 + $curr->val;
            $curr = $curr->next;
        }

        return $ans;
    }
}

$head = new ListNode(null);
$head->addNode($head, 1);
$head->addNode($head, 0);
$head->addNode($head, 1);
$head->showNode($head->next);

$solution = new Solution();
var_dump($solution->getDecimalValue($head->next));
