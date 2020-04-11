<?php
/**
 * User: whh935
 * Date: 2020/3/6 17:42
 * Desc: 剑指offer面试题09-https://leetcode-cn.com/problems/yong-liang-ge-zhan-shi-xian-dui-lie-lcof/
 *      用两个栈实现队列:
 *      队列的声明如下，请实现它的两个函数 appendTail 和 deleteHead ，
 *      分别完成在队列尾部插入整数和在队列头部删除整数的功能。(若队列中没有元素，deleteHead 操作返回 -1 )
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

var_dump($queue->stack2);