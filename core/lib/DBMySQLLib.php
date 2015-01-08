<?php 

class DBMySQLLib      
{      
    
    public static function GetDataTable($sqlStr) {
		$db = mysql_connect("10.152.21.110:3306", "dbone","dbonejia") or die("数据库连接错误"); 
		mysql_select_db("dbone",$db);
		mysql_query("set names utf8");
		$ret = mysql_query($sqlStr); 
		return $ret;
	}

    public static function InsertDataTabletoLastID($sqlStr) {
		$db = mysql_connect("10.152.21.110:3306", "dbone","dbonejia") or die("数据库连接错误"); 
		mysql_select_db("dbone",$db);
		mysql_query("set names utf8");
		$ret = mysql_query($sqlStr); 
		$ret=mysql_insert_id ();
		return $ret;
	}

	
}      
?>
