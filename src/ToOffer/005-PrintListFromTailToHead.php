<?php
/**
 * User: whh935
 * Date: 2019/7/6 01:03
 * Desc: 剑指offer面试题5
 *      逆序打印一个链表
 */

class Node 
{
    public $value = '';
    public $next  = null;

    public function __construct($value)
    {
        $this->value = $value;
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

    $new     = new Node($value);
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
        echo $p->value . ' ';
    }
    echo PHP_EOL;
}

/**
 * @param $head
 */
function printListFromTailToHeadByStack($head)
{
    $p = $head;
    $nodes = [];
    while (!is_null($p->next)) {
        $p = $p->next;
        array_push($nodes, $p);
    }
    
    while (count($nodes) > 0) {
        $node = array_pop($nodes);
        echo $node->value . ' ';
    }
}

/**
 * @param $head
 */
function printListFromTailToHeadByRecursive($head)
{
    if (!is_null($head)) {
        if (!is_null($head->next)) {
            printListFromTailToHeadByRecursive($head->next);
        }

        echo $head->value . ' ';
    }
}

$head = new Node(null);

addNode($head, 'a');
addNode($head, 'b');
addNode($head, 'c');
showNode($head);
echo '---' . PHP_EOL;

printListFromTailToHeadByStack($head);
echo PHP_EOL;
echo '---' . PHP_EOL;

printListFromTailToHeadByRecursive($head);
echo PHP_EOL;