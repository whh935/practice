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

    if (in_array($_SERVER['HTTP_CONTENT_TYPE'],
        ['application/x-www-form-urlencoded', 'multipart/form-data'])
    ) {
        return $_POST;
    } else {
        $params_str = file_get_contents('php://input');
        $params_arr = explode('&', $params_str);
        $result = [];
        foreach ($params_arr as $params) {
            list($params_key, $params_value) = explode('=', $params);
            $result[$params_key] = $params_value;
        }

        return $result;
    }
}

var_dump(getPostBody());

