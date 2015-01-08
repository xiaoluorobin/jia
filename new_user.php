<?php
session_start(); //标志Session的开始
//如果是用户点击发生post事件，则执行
	if ($_POST) { 

		//获取用户输入 
		$username = $_POST['sName']; 
		$passcode = $_POST['spassword'];

		require_once (dirname(__FILE__)."/core/lib/DBMySQLLib.php");
		$result=DBMySQLLib::GetDataTable(
			"select * from tb_user where user_name='".$_POST["sName"]."'"
			); 


		//print_r($_POST['checkbox']);
		echo "<script language=\"javascript\">";
		if(mysql_num_rows($result)==1){

			echo "alert('用户已存在，请重新填写。')";
		}
		else{
			
			$iwebid=DBMySQLLib::InsertDataTabletoLastID(
			"insert into  tb_user(user_name,user_password) values('".$_POST["sName"]."','".$_POST["spassword"]."'"
			); 

			$_SESSION['username'] = $_POST["sName"]; 
			$_SESSION['userid'] = $iwebid; 


			

			//记录在cookies，用于下次登录
			setcookie("hinausercookie",$_SESSION['userid']);
			echo "document.location=\"/main.php\"";
		}
		
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

		</div>
		<div id="mainwrap">
			<div id="content">


<h4 id="app">请填写注册信息完成注册</h4>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 

	名称:<input type="Text" name="sName" class="smallInput" value=""><br> 
	密码:<input type="password" name="spassword" class="smallInput" value=""><br> 
	
	<input type="checkbox" name="weeks[]" id="weeks" value=2 checked="true">自动登录<br>
	<input type="Submit" name="submit" class="buttonface" value="登录"> 

</form> 

			</div>
		</div>
		<div id="footer">
			<div>Copyright © 2014-2016 www.hina.com</div>
		</div>
	
</body>
</html>