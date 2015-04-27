<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
$act=$_GET["act"];//得到传来的动作值


//删除操作
if($act=="del")//假如是删除的值
{
  $id=$_GET["id"];//得到传来的ID值
  $url=$_SERVER['HTTP_REFERER'];//得到传来的上一页动作值
  $sql="delete from bbs where bbs_id='$id'";//构造删除帖子表的SQL语句
  mysql_query($sql);//执行查询
  echo "<script>alert('Has Been Deleted Successfully！'); window.location.href='".$url."';</script>";//弹出删除成功的提示
}
//置顶操作
if($act=="zd")//假如是置顶操作
{
  $url=$_SERVER['HTTP_REFERER'];//得到上一页的地址
  $id=$_GET["id"];//得到传来的ID值
  $value=$_GET["value"];//得到传来的设置值
  $sql="update bbs set is_zd='$value' where bbs_id='$id'";//构造设置BBS置顶值得SQL语句
  mysql_query($sql);//执行查询
  echo "<script>window.location.href='".$url."';</script>";//返回上一页
}
?>