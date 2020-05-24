<?php
/**
 * User: whh935
 * Date: 2020/4/27 22:05
 * Desc:
 */

/**
 * @param $dir_path
 * @return int
 */
function calFileNumbers($dir_path)
{
    if (empty($dir_path)) {
        return 0;
    }

    $dh = @opendir($dir_path);
    if ($dh === false) {
        return 0;
    }

    $numbers = 0;
    while (($file = readdir($dh)) !== false) {
        if (in_array($file, ['.', '..'])) {
            continue;
        }

        $curr_file_path = $dir_path . '/' . $file;
        if (is_dir($curr_file_path)) {
            $numbers += calFileNumbers($curr_file_path);
        } else {
            if (strpos($curr_file_path, '/Array/') !== false) {
                $numbers += 1;
            }
        }
    }
    closedir($dh);

    return $numbers;
}

$dir_path = '/Users/wanghaohua/Code/practice/src/';
var_dump(calFileNumbers($dir_path));
