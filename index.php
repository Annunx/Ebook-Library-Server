<?php
include_once "./config.php";
include_once "./function/dir.php";
include_once "./function/file.php";

// 下级文件夹
$path = !empty($_GET['path']) ? $_GET['path'] : $config['settings']['path'];

$info = readDirectory($path);

if (!empty($_GET['act']) && $_GET['act'] === 'downFile') {
	$fileName = $_GET['path'] . $_GET['filename'];
	downFile($fileName);
	exit;
}
// 浏览器 UA
$header =  $_SERVER['HTTP_USER_AGENT'];
$ret = strstr($header, "Kindle");
if ($ret) {
    $isKindle = true;
} else {
    $isKindle = false;
}
// 用户设置大于默认设置
if (!empty($config['settings']['isKindle'])) {
    echo "强制用户配置";
    $isKindle = $config['settings']['isKindle'];
}

?>
<!DOCTYPE html>
<html lang="zh_CN">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php echo $config['settings']['title'] ?></title>

	<link rel="stylesheet" href="<?php if ($isKindle) {
										echo "/static/styles/kindle.css";
									} else {
										echo "/static/styles/index.css";
									} ?>" />
</head>

<body>
	<div class="container">
		<div class="header">
			<div class="title"><a href="/index.php"><?php echo $config['settings']['title'] ?></a></div>
			<div class=""></div>
			<div class="user">
				<span><?php echo $config['settings']['user'] ?></span>
				<!-- <a href="#" >退出</a> -->
			</div>
		</div>
		<div class="main">

			<div class="list">
				<ul class="title">
					<li><span>类型</span></li>
					<li><span>名称</span></li>
					<li><span>大小</span></li>
					<li><span>修改日期</span></li>
					<li><span>操作</span></li>
				</ul>



				<?php
				if (!empty($info['file'])) {
					foreach ($info['file'] as $val) {
						// $path =iconv("utf-8","gb2312",$path);
						// $val =iconv("utf-8","gb2312",$val);
						$p = $path . "/" . $val;
						$temp = explode(".", $val);
						$ext = end($temp);
						if (!fileExtType($ext, $isKindle)) {
							continue;
						}
				?>

						<ul class="list-item">
							<li>
								<div class="img"><img class="file" src="/static/images/icon/book.png"></div>
							</li>
							<li><span><?php echo $val; ?></span></li>
							<li><?php echo transByte(filesize($p)); ?></li>
							<li><?php echo date("Y-m-d", filemtime($p)); ?></li>
							<?php
							if ($isKindle) {
							?>
								<li><a class="download" href="<?php echo $path . "/" . $val; ?>" download="<?php echo $val; ?>">下载</a></li>
							<?php
							} else {
							?>
								<li><a href="index.php?act=downFile&path=<?php echo urlencode($path); ?>&filename=<?php echo urlencode($p); ?>">下载</a></li>
							<?php
							}
							?>
						</ul>
				<?php
					}
				}
				?>

				<?php
				if (!empty($info['dir'])) {
					foreach ($info['dir'] as $val) {
						$p = $path . "/" . $val;
				?>
						<ul class="list-item">
							<li>
								<div class="img"><img class="folder" src="/static/images/icon/folder.png"></div>
							</li>
							<li><?php echo $val; ?></li>
							<li><?php $sum = 0;
								echo transByte(dirSize($p)); ?></li>
							<li><?php echo date("Y-m-d", filemtime($p)); ?></li>
							<li><a href="index.php?path=<?php echo urlencode($p); ?>">打开</a></li>
						</ul>
				<?php
					}
				}
				?>
			</div>
		</div>
		<div class="footer">
			<div class="copyright">
				<p>Design By <a href="http://fangjiayun.com">Annun</a></p>
			</div>
		</div>
	</div>
</body>

</html>