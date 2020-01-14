<?php
/**
 * User: whh935
 * Date: 2019/7/8 15:53
 * Desc: 剑指offer面试题4
 *      替换字符串中的空格为%20
 */

/**
 * @param $str
 * @return string
 */
function replaceBlank($str)
{
    $original_length = strlen($str);
    if ($original_length <= 0) {
        return '';
    }

    $blanks = 0;
    for ($i = 0; $i < $original_length; $i++) {
        if ($str[$i] == ' ') {
            $blanks++;
        }
    }

    $new_length = ($original_length + $blanks * 2) - 1;
    for ($i = $original_length - 1; $i >= 0; $i--) {
        if ($str[$i] == ' ') {
            $str[$new_length--] = '0';
            $str[$new_length--] = '2';
            $str[$new_length--] = '%';
        } else {
            $str[$new_length--] = $str[$i];
        }
    }

    return $str;
}

$str = 'whh is cool!';
var_dump(replaceBlank($str));
