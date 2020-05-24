<?php
/**
 * User: whh935
 * Date: 2020/4/18 10:52
 * Desc: 判断合法ip
 */

/**
 * @param $ip
 * @return bool
 */
function isValidIPv4($ip)
{
    $len = strlen($ip);
    if ($len < 7 || $len > 15) {
        return false;
    }

    $strings = explode('.', $ip);
    if (count($strings) != 4) {
        return false;
    }

    foreach ($strings as $string) {
        $curr_len = strlen($string);
        if ($curr_len == 0 || $curr_len > 3) {
            return false;
        }

        if (($string[0] == '0' && $curr_len != 1)
            || !is_numeric($string)
            || intval($string) > 255
        ) {
            return false;
        }
    }

    return true;
}

$ip = '10.26.27.139';
var_dump(isValidIPv4($ip));
