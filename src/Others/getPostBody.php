<?php
/**
 * User: whh935
 * Date: 2020/3/17 09:41
 * Desc: 获取POST请求的Body
 */

/**
 * @return mixed|void
 */
function getPostBody()
{
    if (php_sapi_name() === 'cli'
        || $_SERVER['REQUEST_METHOD'] != 'POST'
        || !isset($_SERVER['HTTP_CONTENT_TYPE'])
    ) {
        return [];
    }

    if ($_SERVER['HTTP_CONTENT_TYPE'] == 'application/x-www-form-urlencoded') {
        return $_POST;
    } elseif ($_SERVER['HTTP_CONTENT_TYPE'] == 'application/form-data') {
        return $GLOBALS['HTTP_RAW_POST_DATA'];
    } else {
        return [];
    }
}