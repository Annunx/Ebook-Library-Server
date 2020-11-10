<?php
include_once "./config.php";
//Bytes/Kb/MB/GB/TB/EB
/**
 * 转换字节大小
 * @param number $size
 * @return number
 */
function transByte($size)
{
	$arr = array("B", "KB", "MB", "GB", "TB", "EB");
	$i = 0;
	while ($size >= 1024) {
		$size /= 1024;
		$i++;
	}
	return round($size, 2) . $arr[$i];
}

/**
 * 截取文件扩展名
 * @param string $filename
 * @return string
 */
function getExt($filename)
{
	return strtolower(pathinfo($filename, PATHINFO_EXTENSION));
}


/**
 * 下载文件操作
 * @param string $filename
 */
function downFile($filename)
{
	header("Content-Type: application/mobi");
	header("content-disposition:attachment;filename=" . basename($filename));
	header("content-length:" . filesize($filename));
	readfile($filename);
}

/**
 * 复制文件
 * @param string $fileext
 * @param string $kindle
 * @return boolen
 */
function fileExtType($ext, $device)
{
    global  $config;
	$device ? $device : false;
	// 默认仅显示 Kindle 格式
	// Kindle 支持格式，内置浏览器支支持4中格式
	$extArr = array("awz", "txt", "mobi", "prc");
	if (!$device) {
		$extArr =  $config['settings']['ext'];
	};
	if (in_array($ext, $extArr)) {
		return true;
	} else {
		return false;
	}
}
