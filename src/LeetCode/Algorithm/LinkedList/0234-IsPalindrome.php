<?php
/**
 * User: whh935
 * Date: 2020/5/17 22:55
 * Desc: 回文链表-https://leetcode-cn.com/problems/palindrome-linked-list/
 *      请判断一个链表是否为回文链表。
 *      示例 1:
 *          输入: 1->2
 *          输出: false
 *      示例 2:
 *          输入: 1->2->2->1
 *          输出: true
 *      进阶：
 *          你能否用 O(n) 时间复杂度和 O(1) 空间复杂度解决此题？
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
     * @return bool
     */
    function isPalindrome1($head)
    {
        $list = [];
        while ($head !== null) {
            $list[] = $head->val;
            $head = $head->next;
        }

        return $list == array_reverse($list);
    }
}

$head = new ListNode(null);
$head->addNode($head, 1);
$head->addNode($head, 2);
$head->addNode($head, 2);
$head->addNode($head, 1);
$head->showNode($head->next);

$solution = new Solution();
var_dump($solution->isPalindrome1($head->next));
