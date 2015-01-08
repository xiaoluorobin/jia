<?php
require_once (dirname(__FILE__)."/lib/DBMySQLLib.php");


		function GetCategoryHtml_li(){
			$result=DBMySQLLib::GetDataTable("SELECT * FROM tb_category");
			$ret="";
			while($myrow=mysql_fetch_array($result)) { 
				  	$ret=$ret. "<li><a class='e-link' href='#".$myrow["category_id"]."'>".$myrow["category_name"]."</a></li>";


			} 
			return $ret;
		}
		//显示右边的分类列表
		//
		function GetCategoryHtml_li_byuser($suerid){
			$result=DBMySQLLib::GetDataTable("SELECT * FROM tb_category where user_id=".$suerid);
			$htmlret="";
			while($myrow=mysql_fetch_array($result)) { 
				  	$htmlret=$htmlret. "<li><a class='e-link' href='category_add.php?c=".$myrow["category_id"]."'>".$myrow["category_name"]."</a></li>";


			} 
			return $htmlret;
		}

		//添加网站页面显示用户可选的分类下拉列表
		function GetCategoryHtml_option_byuser($suerid){
			$result=DBMySQLLib::GetDataTable("SELECT * FROM tb_category where user_id=".$suerid);
			$htmlret="";

			while($myrow=mysql_fetch_array($result)) { 
				$htmlret=$htmlret. "<option value=\"".$myrow["category_id"]."\">".$myrow["category_name"]."</option>";
				  	
			} 
			return $htmlret;
		}

		//首页显示分类和网站
		function GetCategorywebHtml_byuser($suerid){
			$result=DBMySQLLib::GetDataTable("SELECT * FROM tb_category where user_id=".$suerid);
			$htmlret="";


			while($myrow=mysql_fetch_array($result)) { 
				$htmlret=$htmlret. "<h4 name='".$myrow["category_id"]."'>".$myrow["category_name"]."</h4>";
				$htmlret=$htmlret.  "	<div class=\"labe\">";
				$ssql="SELECT * FROM category_web where category_id=".$myrow["category_id"];
				$wresult=DBMySQLLib::GetDataTable($ssql);
				while($wmywrow=mysql_fetch_array($wresult)) { 
					  	$htmlret=$htmlret.  "<li><a  href='".$wmywrow["web_url"]."' target='_blank'>".$wmywrow["web_name"]."</a></li>";

				} 

				$htmlret=$htmlret.  "</div>";

			} 

			return $htmlret;
		}

		function GetCategoryDataTable(){
			$result=DBMySQLLib::GetDataTable("SELECT * FROM tb_category");
			
			return $result;
		}


?> 


