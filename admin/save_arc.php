<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
$title=$_POST["title"];
$big=$_POST["big"];
$pic=$_POST["pic"];
$content=$_POST["content"];//得到传来的表单值
date_default_timezone_set("PRC");//设置时区
$time=date("Y-m-d");//得到日期值
$act=$_GET['act'];//得到传来的动作值
//添加操作 
if($act=="add")//假如是添加操作
{
$sql="insert into arc(title,content,pic,news_date) values('$title','$content','$pic','$time')";//构造插入公告的SQL语句
mysql_query($sql);//执行查询
echo "<script>alert('Has Already Been Added！'); window.location.href='add_arc.php';</script>";//弹出操作成功的提示
}
//编辑操作
if($act=="edit")//假如是编辑操作
{
$id=$_POST["id"];//得到传来的ID值
$url=$_POST["url"];//得到传来的URL值
$sql="update arc set title='$title',content='$content',pic='$pic',news_date='$news_date' where arc_id='$id'";//构造编辑信息的SQL语句
mysql_query($sql);//执行查询
echo "<script>alert('Has Been Modified Successfully！'); window.location.href='".$url."';</script>";//弹出操作成功的提示
}

//删除操作
if($act=="del")//假如是删除操作
{
$id=$_GET["id"];//得到传来的ID值
$url=$_SERVER["HTTP_REFERER"];//得到上一页的地址
$sql="delete from arc where arc_id='$id'";//构造删除的SQL语句
mysql_query($sql);//执行操作
echo "<script>alert('Has Been Deleted Successfully！'); window.location.href='".$url."';</script>";//弹出成功的提示
}

?>