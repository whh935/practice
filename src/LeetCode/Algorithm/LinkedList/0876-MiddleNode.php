<?php
/**
 * User: whh935
 * Date: 2020/5/17 23:04
 * Desc: 链表的中间结点-https://leetcode-cn.com/problems/middle-of-the-linked-list/
 *      给定一个带有头结点 head 的非空单链表，返回链表的中间结点。
 *      如果有两个中间结点，则返回第二个中间结点。
 *      示例 1：
 *          输入：[1,2,3,4,5]
 *          输出：此列表中的结点 3 (序列化形式：[3,4,5])
 *          返回的结点值为 3 。 (测评系统对该结点序列化表述是 [3,4,5])。
 *          注意，我们返回了一个 ListNode 类型的对象 ans，这样：
 *          ans.val = 3, ans.next.val = 4,
 *          ans.next.next.val = 5, 以及 ans.next.next.next = NULL.
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
     * 快慢指针
     * @param $head
     * @return mixed
     */
    function middleNode($head)
    {
        $slow = $head;
        $fast = $head;
        while ($fast != null && $fast->next != null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return $slow;
    }
}

$head = new ListNode(null);
$head->addNode($head, 1);
$head->addNode($head, 2);
$head->addNode($head, 3);
$head->addNode($head, 4);
$head->addNode($head, 5);
//$head->addNode($head, 6);
$head->showNode($head->next);

$solution = new Solution();
$middle = $solution->middleNode($head->next);
$head->showNode($middle);
