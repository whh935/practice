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
    while (!is_null($p)) {
        echo $p->value . '->';
        $p = $p->next;
    }
    echo 'NULL' . PHP_EOL;
}

$head = new ListNode(null);

addNode($head, '2');
addNode($head, '1');
addNode($head, '3');
addNode($head, '5');
addNode($head, '6');
addNode($head, '4');
addNode($head, '7');
showNode($head->next);

insertNodeAfter($head, '8', 0);
showNode($head->next);

deleteNode($head, 2);
showNode($head->next);
