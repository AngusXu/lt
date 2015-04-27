<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
$bk=$_POST["bk"];
$bk_ms=$_POST["bk_ms"];
$pic=$_POST["pic"];//以上为得到表单传来的值
$act=$_GET["act"];//得到传来的动作值

//大类编辑操作
if($act=="edit")//假如是编辑动作
{
$id=$_POST["id"];//得到传来的ID值
$sql="update bk set bk='$bk',pic='$pic',bk_ms='$bk_ms' where bk_id='$id'";//构造更新版块表的SQL语句
mysql_query($sql);//执行查询动作
echo "<script>alert('Has Been Modified Successfully！'); window.location.href='manage_bk.php';</script>";//弹出成功提示
}


//删除操作
if($act=="del")//假如是删除动作
{
$id=$_GET["id"];//得到传来的ID值
$cx=mysql_query("select * from hy where user_id='$id'");//在会员表里得到根据ID查询的行
$rs=mysql_fetch_assoc($cx);//执行查询动作
$username=$rs["username"];//得到表中的会员账号数据
mysql_free_result($cx);//释放资源
$url=$_SERVER["HTTP_REFERER"];//得到上一页地址
$sql="delete from hy where user_id='$id'";//删除对应ID的会员资料的SQL语句
mysql_query($sql);//执行查询
mysql_query("delete from bbs where username='$username'");//级联删除该会员发表的帖子
echo "<script>alert('Has Been Deleted Successfully！'); window.location.href='".$url."';</script>";//弹出删除成功的提示
}
//锁定操作
if($act=="lock")//如果是锁定操作
{
  $url=$_SERVER['HTTP_REFERER'];//得到上一页地址
  $id=$_GET["id"];//得到传来的ID值
  $value=$_GET["result"];//得到传来的设置值
  $sql="update hy set is_lock='$value' where user_id='$id'";//构造更新表的SQL语句
  mysql_query($sql);//执行锁定操作
  echo "<script>window.location.href='".$url."';</script>";//返回上一页
}
?>