<?php
//打开指定目录
/**
 * 遍历目录函数，只读取目录中的最外层的内容
 * @param string $path
 * @return array
 */
function readDirectory($path)
{
	$arr = [];
	$handle = opendir($path);
	while (($item = readdir($handle)) !== false) {
		//.和..这2个特殊目录
		if ($item != "." && $item != "..") {
			if (is_file($path . "/" . $item)) {
				$arr['file'][] = $item;
			}
			if (is_dir($path . "/" . $item)) {
				$arr['dir'][] = $item;
			}
		}
	}
	closedir($handle);
	return $arr;
}


/**
 * 得到文件夹大小
 * @param string $path
 * @return int 
 */
function dirSize($path)
{
	$sum = 0;
	global $sum;
	$handle = opendir($path);
	while (($item = readdir($handle)) !== false) {
		if ($item != "." && $item != "..") {
			if (is_file($path . "/" . $item)) {
				$sum += filesize($path . "/" . $item);
			}
			if (is_dir($path . "/" . $item)) {
				$func = __FUNCTION__;
				$func($path . "/" . $item);
			}
		}
	}
	closedir($handle);
	return $sum;
}
