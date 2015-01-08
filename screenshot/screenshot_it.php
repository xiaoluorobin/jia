<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>海娜云搜藏</title>
    <link rel="stylesheet" type="text/css" href="/resource/css/css.css">
	<script src="/js/jquery2.1.1/jquery-2.1.1.min.js"></script>
</head>
<body>
<?php
$x = $_REQUEST['x'];
$y = $_REQUEST['y'];
$format = $_REQUEST['format'];
$site = $_REQUEST['site'];
$surl = 'http://jbxue.com/screenshot_it.php?site='.$site.'&x='.$x.'&y='.$y.'&format='.$format;

if($_REQUEST['format'] == 'PNG') {
	$ifm = 'png';
} else {
	$ifm = 'jpg';
}
$imt = 'image/'.$ifm;
$ifn = 'screenshot.'.$ifm;
echo $surl."<br>";
echo $ifn;
if(isset($_REQUEST['preview'])) {

	$iurl = 'http://localhost/screenshot/screenshot_it.php?site='.$site.'&x='.$x.'&y='.$y.'&format='.$format; 
	//例如：http://jbxue.com/screenshot_it.php?site='.$site.'&x='.$x.'&y='.$y.'&format='.$format;
	$iurl = 'http://jbxue.com/screenshot_it.php?site='.$site.'&x='.$x.'&y='.$y.'&format='.$format; 
	$gwptitle = $_REQUEST['site'].' www.jbxue.com';
	//include_once("../css.php");   
	//可以删除

	echo '<div>';
	echo '&raquo; <b>点击图片下载截图！</div></b><br/><a href="'.$iurl.'"><img src="'.$iurl.'" width="240" height="320" /></a><br />';
} else {
	header("Content-type: $imt");
	header("Content-Disposition: attachment; filename= $ifn");
	readfile($surl);
}
?>