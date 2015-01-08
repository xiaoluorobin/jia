<?php 
	session_start(); //标志Session的开始

?>
<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require_once (dirname(__FILE__)."/core/lib/DBMySQLLib.php");
		$iwebid=DBMySQLLib::InsertDataTabletoLastID(
			"INSERT INTO tb_web(web_name,web_url,web_create_date,web_create_user) VALUES ('".$_POST["sName"]."','".$_POST["sURL"]."','".date("Y-m-d H:i:s")."','".$_SESSION['userid']."')");
		
		
		DBMySQLLib::GetDataTable(
			"INSERT INTO tb_category_web_map(web_id,category_id) VALUES (".$iwebid.",".$_POST["sCategory"].")");
			 
		echo "<script language=\"javascript\">";
		echo "document.location=\"/main.php\"";
		echo "</script>";
	}



?> 
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>海娜云搜藏</title>
    <link rel="stylesheet" type="text/css" href="/resource/css/css.css">
	<script src="/js/jquery2.1.1/jquery-2.1.1.min.js"></script>
</head>
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
								<a href="/main.php">返回</a>
								
								<a href="/category_add.php">配置分类</a>
								<a href="/tutorial/index.php">网站导航</a>
								
								<a href="/download/index.php">个人设置</a>
								<a href="/extension/index.php">分享中心</a>
								
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

<h4 id="app">添加网站</h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

	名称:<input type="Text" name="sName" class="smallInput"><br> 
	地址:<input type="Text" name="sURL" class="smallInput"><br> 
	分类:
	<select name="sCategory">
		<option value="-1">未分类</option>

<?php

require_once (dirname(__FILE__)."/core/getcategorydata_html.php");
	echo GetCategoryHtml_option_byuser($_SESSION['userid']);

?>


	</select><br><br>

	<input type="Submit" name="submit" class="buttonface" value="添加"> 

</form> 





			</div>
		</div>
		<div id="footer">
			<div>Copyright © 2014-2016 www.hina.com</div>
		</div>
	
</body>
</html>