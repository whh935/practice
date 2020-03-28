<?php
/**
 * User: whh935
 * Date: 2020/3/28 10:55
 * Desc: 数组和对象的互相转化
 */

/**
 * 数组转对象
 * @param $array
 * @return stdClass
 */
function arrayToObject($array)
{
    if (is_array($array)) {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            $object->$key = $value;
        }
    } else {
        $object = $array;
    }

    return $object;
}

/**
 * 对象转数组
 * @param $object
 * @return array
 */
function objectToArray($object)
{
    if (is_object($object)) {
        $array = [];
        foreach ($object as $key => $value) {
            $array[$key] = $value;
        }
    } else {
        $array = $object;
    }

    return $array;
}

$array = ['name' => 'whh', 'sex' => 'male'];
$object = arrayToObject($array);
var_dump($object->name);

$arr = objectToArray($object);
var_dump($arr['name']);