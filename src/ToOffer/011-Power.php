<?php
/**
 * User: whh935
 * Date: 2019/7/9 16:07
 * Desc: 剑指offer面试题11
 *      求一个数的整数次方
 */

/**
 * @param $base
 * @param $exponent
 * @return float|int
 */
function power($base, $exponent)
{
    if (!is_int($exponent)) {
        echo '指数非整数' . PHP_EOL;
        return 0;
    }
    if (abs($base) < 0.000001 && 0 == $exponent) {
        return 0;
    }

    $abs_exponent = $exponent;
    if ($exponent < 0) {
        $abs_exponent = -$exponent;
    }

    $result = powerWithUnsignedExponent($base, $abs_exponent);
    if ($exponent < 0) {
        $result = 1 / $result;
    }

    return $result;
}

/**
 * @param $base
 * @param $exponent
 * @return int
 */
function powerWithUnsignedExponent($base, $exponent)
{
    if (0 == $exponent) {
        return 1;
    }
    if (1 == $exponent) {
        return $base;
    }

    $result = powerWithUnsignedExponent($base, $exponent >> 1);
    $result *= $result;
    if ($exponent & 1 == 1) {
        $result *= $base;
    }

    return $result;
}

$base = 2;
$exponent = 3;
var_dump(power($base, $exponent));

