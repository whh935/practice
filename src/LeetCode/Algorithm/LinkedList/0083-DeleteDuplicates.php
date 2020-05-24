<?php
/**
 * User: whh935
 * Date: 2020/5/17 23:22
 * Desc: 删除排序链表中的重复元素-https://leetcode-cn.com/problems/remove-duplicates-from-sorted-list/
 *      给定一个排序链表，删除所有重复的元素，使得每个元素只出现一次。
 *      示例 1:
 *          输入: 1->1->2
 *          输出: 1->2
 *      示例 2:
 *          输入: 1->1->2->3->3
 *          输出: 1->2->3
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
     * @return mixed
     */
    function deleteDuplicates($head)
    {
        $curr = $head;
        while ($curr != null && $curr->next != null) {
            if ($curr->next->val == $curr->val) {
                $curr->next = $curr->next->next;
            } else {
                $curr = $curr->next;
            }
        }

        return $head;
    }
}

$head = new ListNode(null);
$head->addNode($head, 1);
$head->addNode($head, 1);
$head->addNode($head, 2);
$head->addNode($head, 3);
$head->addNode($head, 3);
$head->showNode($head->next);

$solution = new Solution();
$del_head = $solution->deleteDuplicates($head->next);
$head->showNode($del_head);
