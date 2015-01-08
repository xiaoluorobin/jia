<?php 

	require_once (dirname(__FILE__)."/lib/DBMySQLLib.php");
		
			$result=DBMySQLLib::GetDataTable("SELECT * FROM tb_category where user_id=".$_SESSION['userid']);

			while($myrow=mysql_fetch_array($result)) { 
				  	echo "<li><a class='e-link' href='#".$myrow["category_id"]."'>".$myrow["category_name"]."</a></li>";

			} 


?> 


