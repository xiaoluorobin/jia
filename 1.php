<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理-登录</title>
</head>
<body>
<?php  
//功能：遍历并打印指定目录下所有文件  
  
function scan_dir($dir_name,$dir_flag=1) {  
    static $FILE_COUNT=1;                //记录文件数目 初值为1 目录名称不记  
    $FILE_COUNT--;                       //每调用一次scan_dir()函数自减1  
    @$dir_handle=opendir($dir_name);     //抑制错误信息显示  便于自定义错误显示  
    if(!$dir_handle)  
    die("目录打开错误！");  
    while(false!==($filename=readdir($dir_handle)))  //文件名为‘0’时，readdir返回 FALSE，判断返回值是否不全等  
    {                                     
  
        $flag=$dir_flag;                 //古怪的 is_dir($filename) ! $filename这个路径必须能够寻到！当$filename不存在或者不是目录时返回false  
        if($filename!='.'&&$filename!='..')  
        {  
            $FILE_COUNT++;                   //不记录当前路径和上一级路径  
            while($flag>0&&--$flag)          //负数仍为真  
                echo '&nbsp';  
            if(is_dir($dir_name.$filename))  //判断 是否为一个目录  
            {  
                echo '<strong>'."<a href=".$dir_name.$filename.">".$filename."</a></strong><br>";  
                scan_dir($dir_name.$filename.'/',$dir_flag+1);      //$dir_flag标志目录树层次  
            }  
            else   
            {  
                echo "<a href=".$dir_name.$filename.">".$filename."</a><br>";  
            }  
        }  
    }  
    closedir($dir_handle);                 //关闭目录句柄  
    echo "文件总数:".$FILE_COUNT.'<br>';  
}  
  
scan_dir('F:/phpdev/upupw/htdocs/');  
?>
</body>
</html>