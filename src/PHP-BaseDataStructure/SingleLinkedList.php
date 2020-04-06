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

    /**
     * @param $head
     * @return int
     */
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
     * @param $value
     * @param $pos
     */
    function insertNodeAfter($head, $value, $pos)
    {
        if ($pos > $this->countNode($head)) {
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

    /**
     * @param $head
     * @param $pos
     */
    function deleteNode($head, $pos)
    {
        if ($pos > $this->countNode($head)) {
            return;
        }

        $p = $head;
        for ($i = 0; $i < $pos - 1; $i++) {
            $p = $p->next;
        }

        $p->next = $p->next->next;
    }

    /**
     * @param $head
     */
    function showNode($head)
    {
        $p = $head;
        while (!is_null($p)) {
            echo $p->value . '->';
            $p = $p->next;
        }
        echo 'NULL' . PHP_EOL;
    }
}

$head = new ListNode(null);
$head->addNode($head, '2');
$head->addNode($head, '1');
$head->addNode($head, '3');
$head->addNode($head, '5');
$head->addNode($head, '6');
$head->addNode($head, '4');
$head->addNode($head, '7');
$head->showNode($head->next);

$head->insertNodeAfter($head, '8', 0);
$head->showNode($head->next);

$head->deleteNode($head, 2);
$head->showNode($head->next);
