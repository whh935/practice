<?php
/**
 * User: whh935
 * Date: 2020/3/6 17:42
 * Desc: 剑指offer面试题7
 *      两个栈实现一个队列
 */

class StackToQueue
{
    public $stack1;
    public $stack2;

    /**
     * StackToQueue constructor.
     */
    public function __construct()
    {
        $this->stack1 = array();
        $this->stack2 = array();
    }

    /**
     * @param $value
     */
    public function appendTail($value)
    {
        while (!empty($this->stack2)) {
            array_push($this->stack1, array_pop($this->stack2));
        }
        array_push($this->stack1, $value);
    }

    /**
     * @return int|mixed
     */
    public function deleteHead()
    {
        while (!empty($this->stack1)) {
            array_push($this->stack2, array_pop($this->stack1));
        }

        return !empty($this->stack2) ? array_pop($this->stack2) : -1;
    }
}

$queue = new StackToQueue();
$queue->appendTail(1);
$queue->appendTail(2);
$queue->appendTail(3);

$num1 = $queue->deleteHead();
var_dump($num1);
echo PHP_EOL;

var_dump($queue->stack2);