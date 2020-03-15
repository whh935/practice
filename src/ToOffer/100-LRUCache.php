<?php
/**
 * User: whh935
 * Date: 2020/3/7 14:12
 * Desc: LRU是最近最少使用页面置换算法(Least Recently Used),也就是首先淘汰最长时间未被使用的页面
 */

/**
 * LRU是最近最少使用页面置换算法(Least Recently Used),也就是首先淘汰最长时间未被使用的页面
 */
class LRUCache
{
    private $array_lru = array();
    private $max_size = 0;

    function __construct($size)
    {
        // 缓存最大存储
        $this->max_size = $size;
    }

    public function setValue($key, $value)
    {
        // 如果存在，则向队尾移动，先删除，后追加
        if (array_key_exists($key, $this->array_lru)) {
            unset($this->array_lru[$key]);
        }
        // 长度检查，超长则删除首元素
        if (count($this->array_lru) >= $this->max_size) {
            array_shift($this->array_lru);
        }
        // 队尾追加元素
        $this->array_lru[$key] = $value;
    }

    public function getValue($key)
    {
        $ret_value = false;

        if (array_key_exists($key, $this->array_lru)) {
            $ret_value = $this->array_lru[$key];
            // 移动到队尾
            unset($this->array_lru[$key]);
            $this->array_lru[$key] = $ret_value;
        }

        return $ret_value;
    }

    public function varDumpCache()
    {
        var_dump($this->array_lru);
    }
}

$cache = new LRUCache(5);
$cache->setValue("01", "01");
$cache->setValue("02", "02");
$cache->setValue("03", "03");
$cache->setValue("04", "04");
$cache->setValue("05", "05");
$cache->varDumpCache();

$cache->setValue("06", "06");
$cache->varDumpCache();

$cache->setValue("03", "03");
$cache->varDumpCache();

$cache->setValue("07", "07");
$cache->varDumpCache();

$cache->setValue("01", "01");
$cache->varDumpCache();
