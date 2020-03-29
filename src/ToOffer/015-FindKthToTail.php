<?php
/**
 * User: whh935
 * Date: 2020/3/24 23:37
 * Desc: 剑指offer面试题15
 *      输入一个链表，输出该链表中倒数第k个节点
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

/**
 * 链表中倒数第K个节点
 * @param $head
 * @param $k
 * @return null
 */
function findKthToTail($head, $k)
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

$head = new ListNode(null);

addNode($head, 1);
addNode($head, 2);
addNode($head, 3);
addNode($head, 4);
addNode($head, 5);
showNode($head);
echo PHP_EOL;

var_dump(findKthToTail($head->next, 3));
