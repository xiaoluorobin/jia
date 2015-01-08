
<?php 
	session_start(); //标志Session的开始
		//unset($_SESSION['username']);
		//unset($_SESSION['userid']);
		$_SESSION['username']="";
		unset($_SESSION['username']);
		$_SESSION['userid']="";
		unset($_SESSION['userid']);
		echo "<script language=\"javascript\">";

		echo "document.location=\"/login.php\"";
		echo "</script>";



?> 
