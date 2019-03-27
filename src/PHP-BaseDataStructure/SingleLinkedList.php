<?php
class Node {
    public $value = '';
    public $next  = null;

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

    $new     = new Node($value);
    $p->next = $new;
}

function insertNodeAfter($head, $value, $pos)
{
    if ($pos > countNode($head)) {
        return;
    }

    $p   = $head;
    $new = new Node($value);
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
        echo $p->value . PHP_EOL;
    }
}

$head = new Node(null);

addNode($head, 'a');
addNode($head, 'b');
addNode($head, 'c');
showNode($head);
echo '---' . PHP_EOL;

insertNodeAfter($head, 'd', 0);
showNode($head);
echo '---' . PHP_EOL;

deleteNode($head, 2);
showNode($head);
