<?php
/**
 * User: whh935
 * Date: 2020/5/7 23:14
 * Desc: 环形链表-https://leetcode-cn.com/problems/linked-list-cycle/
 *      给定一个链表，判断链表中是否有环。
 *      为了表示给定链表中的环，我们使用整数 pos 来表示链表尾连接到链表中的位置（索引从 0 开始）。
 *      如果 pos 是 -1，则在该链表中没有环。
 *      示例 1：
 *          输入：head = [3,2,0,-4], pos = 1
 *          输出：true
 *          解释：链表中有一个环，其尾部连接到第二个节点
 */

class Solution
{
    /**
     * @param $head
     * @return bool
     */
    function hasCycle($head)
    {
        if ($head == null || $head->next == null) {
            return false;
        }

        $slow = $head;
        $fast = $head->next;
        while ($slow != $fast) {
            if ($fast == null || $fast->next == null) {
                return false;
            }
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        return true;
    }
}