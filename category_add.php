<?php
session_start(); //标志Session的开始

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once (dirname(__FILE__)."/core/lib/DBMySQLLib.php");
    $typeandID=substr($_POST["htype"],0,1);
    if($typeandID=="a"){

        DBMySQLLib::GetDataTable(
            "INSERT INTO tb_category(category_name,category_desc,user_id) VALUES ('".$_POST["sName"]."','".$_POST["sDESC"]."','".$_SESSION['userid']."')");
    }
    else{
        DBMySQLLib::GetDataTable(
            "update tb_category set category_name=\"".$_POST["sName"]."\" , category_desc=\"".$_POST["sDESC"]."\" where category_id=".substr($_POST["htype"],2));
        //echo "update tb_category set category_name=\"".$_POST["sName"]."\" , category_desc=\"".$_POST["sDESC"]."\" where category_id=".substr($_POST["htype"],2).";";
    }


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


        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <?php

            if($_GET && isset($_GET['c'])){
                $c_str=$_GET['c'];
                $result=DBMySQLLib::GetDataTable("select category_name,category_desc from tb_category where category_id=".$c_str);
                $myrow=mysql_fetch_array($result);
                $c_strName= $myrow["category_name"];
                $c_strDESC= $myrow["category_desc"];

                echo "<h4 id=\"app\">修改分类</h4>";
                echo "分类名称:<input type=\"Text\" name=\"sName\" class=\"smallInput\" value=\"".$c_strName."\"><br>";
                echo "分类描述:<input type=\"Text\" name=\"sDESC\" class=\"smallInput\" value =\"".$c_strDESC."\"><br> ";
                echo "<input type=\"hidden\" name=\"htype\" value=\"m-".$c_str."\"> ";
                echo "<input type=\"Submit\" name=\"submit\" class=\"buttonface\" value=\"修改\">";


            }
            else
            {
                echo "<h4 id=\"app\">新增分类</h4>";
                echo "分类名称:<input type=\"Text\" name=\"sName\" class=\"smallInput\"><br>";
                echo "分类描述:<input type=\"Text\" name=\"sDESC\" class=\"smallInput\"><br>";
                echo "<input type=\"hidden\" name=\"htype\" value=\"a-".$c_str."\"> ";
                echo "<input type=\"Submit\" name=\"submit\" class=\"buttonface\" value=\"添加\"> ";
            }

            ?>




        </form>
        ?			</div>
</div>
<div id="footer">
    <div>Copyright ? 2014-2016 www.hina.com</div>
</div>

</body>
</html>
