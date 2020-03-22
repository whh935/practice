<?php
/**
 * User: whh935
 * Date: 2020/3/10 10:24
 * Desc: 单链表
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

function countNode($head)
{
    $p = $head;
    $i = 0;
    while (!is_null($p->next)) {
        ++$i;
        $p = $p->next;
    }

    return $i;
}

function addNode($head, $value)
{
    $p = $head;
    while (!is_null($p->next)) {
        $p = $p->next;
    }

    $new     = new ListNode($value);
    $p->next = $new;
}

function insertNodeAfter($head, $value, $pos)
{
    if ($pos > countNode($head)) {
        return;
    }

    $p   = $head;
    $new = new ListNode($value);
    for ($i = 0; $i < $pos; $i++) {
        $p = $p->next;
    }

    $new->next = $p->next;
    $p->next   = $new;
}

function deleteNode($head, $pos)
{
    if ($pos > countNode($head)) {
        return;
    }

    $p = $head;
    for ($i = 0; $i < $pos - 1; $i++) {
        $p = $p->next;
    }

    $p->next = $p->next->next;
}

function showNode($head)
{
    $p = $head;
    while (!is_null($p->next)) {
        $p = $p->next;
        echo $p->value . '->';
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

/**
 * head为头节点
 * @param $head
 * @return mixed
 */
function reverse($head)
{
    if ($head == null) {
        return $head;
    }

    $pre = $head;       // 取出head节点
    $cur = $head->next; // 把当前节点指向下一个节点
    $next = null;
    while ($cur != null) {
        $next = $cur->next;
        $cur->next = $pre; // 把当前节点的指针指向前一个节点
        $pre = $cur;
        $cur = $next;
    }

    // 将原链表的头节点的下一个节点设置为null，再把反转后的头节点赋给head
    $head->next = null;
    $head = $pre;

    return $head;
}

$head = new ListNode(null);

addNode($head, '2');
addNode($head, '1');
addNode($head, '3');
addNode($head, '5');
addNode($head, '6');
addNode($head, '4');
addNode($head, '7');
showNode($head);

$reverse_head = reverse($head);
var_dump($reverse_head);
echo PHP_EOL;

var_dump(findKthToTail($head, 3));

insertNodeAfter($head, 'd', 0);
showNode($head);
echo '---' . PHP_EOL;

deleteNode($head, 2);
showNode($head);
