<?php
/**
 * User: whh935
 * Date: 2020/3/25 17:59
 * Desc: LeetCode第146题-https://leetcode-cn.com/problems/lru-cache/
 *      运用你所掌握的数据结构，设计和实现一个  LRU (最近最少使用) 缓存机制。
 *      它应该支持以下操作： 获取数据 get 和 写入数据 put 。
 *      获取数据 get(key) - 如果密钥 (key) 存在于缓存中，则获取密钥的值（总是正数），否则返回 -1。
 *      写入数据 put(key, value) - 如果密钥不存在，则写入其数据值。
 *      当缓存容量达到上限时，它应该在写入新数据之前删除最久未使用的数据值，从而为新的数据值留出空间。
 */

class LRUCache
{
    private $array_lru = [];
    private $capacity = 0;

    /**
     * LRUCache constructor.
     * @param $capacity
     */
    function __construct($capacity)
    {
        $this->capacity = $capacity;
    }

    /**
     * @param Integer $key
     * @return Integer
     */
    function get($key)
    {
        $ret_value = -1;
        if (array_key_exists($key, $this->array_lru)) {
            $ret_value = $this->array_lru[$key];
            // 移动到队尾
            unset($this->array_lru[$key]);
            $this->array_lru[$key] = $ret_value;
        }

        return $ret_value;
    }

    /**
     * @param Integer $key
     * @param Integer $value
     * @return NULL
     */
    function put($key, $value)
    {
        // 如果存在，则向队尾移动，先删除，后追加
        if (array_key_exists($key, $this->array_lru)) {
            unset($this->array_lru[$key]);
        }
        // 长度检查，超长则删除首元素
        if (count($this->array_lru) >= $this->capacity) {
            $i = 0;
            $first_key = '';
            foreach ($this->array_lru as $tmp_key => $tmp_value) {
                if ($i == 0) {
                    $first_key = $tmp_key;
                    break;
                }
            }
            unset($this->array_lru[$first_key]);
            // array_shift($this->array_lru);
        }
        // 队尾追加元素
        $this->array_lru[$key] = $value;
    }
}

$cache = new LRUCache(2);
$cache->put(1, 1);
$cache->put(2, 2);

var_dump($cache->get(1));

$cache->put(3, 3);
var_dump($cache->get(2));
$cache->put(4, 4);

var_dump($cache->get(1));
var_dump($cache->get(3));
var_dump($cache->get(4));