<?php
/**
 * User: whh935
 * Date: 2020/3/13 10:26
 * Desc: LeetCode第2题-https://leetcode-cn.com/problems/add-two-numbers/
 *      两数相加
 *      给出两个 非空 的链表用来表示两个非负的整数。
 *      其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 *      输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 *      输出：7 -> 0 -> 8
 *      原因：342 + 465 = 807
 */

class ListNode
{
    public $value = '';
    public $next  = null;

    /**
     * ListNode constructor.
     * @param $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }
}

function addTwoNumbers($l1, $l2)
{

}