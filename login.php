<?php
session_start(); //标志Session的开始
//如果是用户点击发生post事件，则执行
	if ($_POST) { 
		//获取用户输入 
		$username = $_POST['sName']; 
		$passcode = $_POST['spassword'];

		require_once (dirname(__FILE__)."/core/lib/DBMySQLLib.php");
		$result=DBMySQLLib::GetDataTable(
			"select * from tb_user where user_name='".$_POST["sName"]."' and user_password='".$_POST["spassword"]."'"
			); 


		//print_r($_POST['checkbox']);
		echo "<script language=\"javascript\">";
		if(mysql_num_rows($result)==1){
			$_SESSION['username'] = $_POST["sName"]; 
                         $result = mysql_fetch_array($result); 
	   	        $_SESSION['userid'] = $result["user_id"]; //$result = mysql_fetch_array($result)["user_id"]; 
			//记录在cookies，用于下次登录
			setcookie("hinausercookie",$_SESSION['userid']);
			echo "document.location=\"/main.php\"";
		}
		else{
			echo "alert('登录错误,请重新登录。')";
		}
		
		echo "</script>";
	}
	else{
		
		echo $_COOKIE["hinausercookie"];
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

		</div>
		<div id="mainwrap">
			<div id="content">


<h4 id="app">请登录</h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

	名称:<input type="Text" name="sName" class="smallInput" value=""><br> 
	密码:<input type="password" name="spassword" class="smallInput" value=""><br> 
	
	<input type="checkbox" name="weeks[]" id="weeks" value=2 checked="true">记住我<br>
	<input type="Submit" name="submit" class="buttonface" value="登录"> 

</form> 
<a href="new_user.php">新用户注册</a>

			</div>
		</div>
		<div id="footer">
			<div>Copyright © 2014-2016 www.hina.com</div>
		</div>
	
</body>
</html>
