<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
$bk=$_POST["bk"];
$bk_ms=$_POST["bk_ms"];
$pic=$_POST["pic"];
$act=$_GET["act"];//以上为得到上一页传来的表单值
//添加操作 
if($act=="add")//假如是添加操作
{
$sql="insert into bk(bk,bk_ms,pic) values('$bk','$bk_ms','$pic')";//构造插入版块的SQL语句
mysql_query($sql);//执行查询
echo "<script>alert('Has Already Been Added！'); window.location.href='add_bk.php';</script>";//弹出操作成功的提示
}
//大类编辑操作
if($act=="edit")//假如是编辑操作
{
$id=$_POST["id"];//得到传来的ID值
$sql="update bk set bk='$bk',pic='$pic',bk_ms='$bk_ms' where bk_id='$id'";//更新版块表的SQL语句
mysql_query($sql);//执行查询
echo "<script>alert('Has Been Modified Successfully！'); window.location.href='manage_bk.php';</script>";//弹出操作成功的提示
}


//删除操作
if($act=="del")//假如是删除操作
{
$id=$_GET["id"];//得到传来的ID值
$url=$_SERVER["HTTP_REFERER"];//得到传来的上一页地址
$sql="delete from bk where bk_id='$id'";//在半空表里删除对应ID的SQL语句
mysql_query($sql);//执行查询
$sql="delete from bbs where bk_id='$id'";//删除帖子表中对应版块ID的SQL语句
 mysql_query($sql);//执行查询
echo "<script>alert('Has Been Deleted Successfully！'); window.location.href='".$url."';</script>";//弹出删除成功的提示
}
?>