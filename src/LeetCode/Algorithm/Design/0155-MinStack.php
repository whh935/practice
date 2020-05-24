<?php
/**
 * User: whh935
 * Date: 2020/5/12 23:33
 * Desc: 最小栈-https://leetcode-cn.com/problems/min-stack/
 *      设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。
 *          push(x) —— 将元素 x 推入栈中。
 *          pop() —— 删除栈顶的元素。
 *          top() —— 获取栈顶元素。
 *          getMin() —— 检索栈中的最小元素。
 *      示例:
 *          输入：
 *          ["MinStack","push","push","push","getMin","pop","top","getMin"]
 *          [[],[-2],[0],[-3],[],[],[],[]]
 *          输出：
 *          [null,null,null,null,-3,null,0,-2]
 *          解释：
 *          MinStack minStack = new MinStack();
 *          minStack.push(-2);
 *          minStack.push(0);
 *          minStack.push(-3);
 *          minStack.getMin();   --> 返回 -3.
 *          minStack.pop();
 *          minStack.top();      --> 返回 0.
 *          minStack.getMin();   --> 返回 -2.
 *      提示：
 *          pop、top 和 getMin 操作总是在 非空栈 上调用。
 */

class MinStack
{
    protected $data;
    protected $helper;//辅助栈

    /**
     * MinStack constructor.
     */
    function __construct()
    {
        $this->data = new SplStack();
        $this->helper = new SplStack();
    }

    /**
     * @param Integer $x
     * @return NULL
     */
    function push($x)
    {
        $this->data->push($x);
        if ($this->helper->count() == 0 || $x <= $this->helper->top()) {
            $this->helper->push($x);
        }
    }

    /**
     * @return NULL
     */
    function pop()
    {
        $x = null;
        if ($this->data->count()) {
            $x = $this->data->pop();
        }

        if (isset($x) && $this->helper->count() && $this->helper->top() == $x) {
            $this->helper->pop();
        }
    }

    /**
     * @return Integer
     */
    function top()
    {
        if ($this->data->count() == 0) {
            return null;
        }
        return $this->data->top();
    }

    /**
     * @return Integer
     */
    function getMin()
    {
        if ($this->helper->count() == 0) {
            return null;
        }
        return $this->helper->top();
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($x);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */