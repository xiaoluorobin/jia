<?php 
	session_start(); //标志Session的开始

	if(!isset($_SESSION['username'])){
    	header("Location:login.php");
    exit();
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>海娜云搜藏</title>
    <link rel="stylesheet" type="text/css" href="/resource/css/css.css">
	<script src="/js/jquery2.1.1/jquery-2.1.1.min.js"></script>
	<script src="/resource/js/js.js"></script>
</head>
<body>
<body>
		<div id="header">
			<div id="header-inner">
				<table cellpadding="0" cellspacing="0" style="width:100%;">
					<tr>
						<td rowspan="2" style="width:20px;">
						</td>
						<td style="height:45px;">
							<div style="color:#fff;font-size:22px;font-weight:bold;">
								<a href="#" style="color:#fff;font-size:22px;font-weight:bold;text-decoration:none">海娜收藏</a>
							</div>
							<div style="color:#fff">
								<a href="#" style="color:#fff;text-decoration:none">发现、搜藏、分享，快速直达</a>
							</div>
						</td>
						<td style="padding-right:5px;text-align:right;vertical-align:bottom;">
							<div id="topmenu">
								<a href="javascript:void(0)" onclick="SetHome(this,window.location)">设为首页</a>
								<a href="#" onclick="addfavorite()">添加收藏夹</a>
								<a href="/web_add.php">添加网站</a>
								
								<a href="/category_add.php">配置分类</a>
								<a href="/tutorial/index.php">网站导航</a>
								
								<a href="/download/index.php">个人设置</a>
								<a href="/extension/index.php">分享中心</a>
								|
								<a href="/logout.php"><?php echo $_SESSION['username']  ?>注销</a>
							</div>
						</td>
					</tr>
				</table>
			</div>
			
		</div>
		<div id="mainwrap">
			<div id="content">


				<div style="width:150px;height:250px;padding:0 20px;background:#FBFBFB;border:1px solid #ccc;float:right">
					<h3>分类</h3>
					<ul class="e-list">
				<?php 
					require_once (dirname(__FILE__)."/core/getcategorydata_html.php");
					echo GetCategoryHtml_li_byuser($_SESSION['userid']);
				?>
					</ul>
				</div>

				<?php 
					echo GetCategorywebHtml_byuser($_SESSION['userid']);
				?>

			</div>
		</div>
		<div id="footer">
			<div>Copyright © 2014-2016 www.hina.com</div>
		</div>
	</body>
</body>
</html>