<?php
/**
 * User: whh935
 * Date: 2020/3/13 10:26
 * Desc: 两数相加-https://leetcode-cn.com/problems/add-two-numbers/
 *      给出两个 非空 的链表用来表示两个非负的整数。
 *      其中，它们各自的位数是按照 逆序 的方式存储的，并且它们的每个节点只能存储 一位 数字。
 *      输入：(2 -> 4 -> 3) + (5 -> 6 -> 4)
 *      输出：7 -> 0 -> 8
 *      原因：342 + 465 = 807
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
     * 官方题解：
     * 将当前结点初始化为返回列表的哑结点。
     * 将进位 carry 初始化为 0。
     * 将 p和 q分别初始化为列表 l1 和 l2 的头部。
     * 遍历列表 l1 和 l2 直至到达它们的尾端。
     * 将 x 设为结点 p 的值。如果 p 已经到达 l1 的末尾，则将其值设置为 0。
     * 将 y 设为结点 q 的值。如果 q 已经到达 l2 的末尾，则将其值设置为 0。
     * 设定 sum = x + y + carry。
     * 更新进位的值，carry = sum / 10。
     * 创建一个数值为 (sum mod 10) 的新结点，并将其设置为当前结点的下一个结点，然后将当前结点前进到下一个结点。
     * 同时，将 p 和 q 前进到下一个结点。
     * 检查 carry = 1 是否成立，如果成立，则向返回列表追加一个含有数字 1 的新结点。如99+1
     * 返回哑结点的下一个结点。
     */

    /**
     * @param $l1
     * @param $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2)
    {
        $dummy_head = new ListNode(0);
        $curr = $dummy_head;
        $carry = $sum = 0;
        while ($l1 != null || $l2 != null) {
            $x = ($l1 != null) ? $l1->val : 0;
            $y = ($l2 != null) ? $l2->val : 0;
            $sum = $carry + $x + $y;
            $carry = intval($sum / 10);
            $curr->next = new ListNode($sum % 10);
            $curr = $curr->next;
            ($l1 != null) && $l1 = $l1->next;
            ($l2 != null) && $l2 = $l2->next;
        }
        if ($carry > 0) {
            $curr->next = new ListNode($carry);
        }

        return $dummy_head->next;
    }
}

$l1 = new ListNode(null);
$l1->addNode($l1, 2);
$l1->addNode($l1, 4);
$l1->addNode($l1, 3);

$l2 = new ListNode(null);
$l2->addNode($l2, 5);
$l2->addNode($l2, 6);
$l2->addNode($l2, 4);

$solution = new Solution();
$add = $solution->addTwoNumbers($l1->next, $l2->next);
$add->showNode($add);
