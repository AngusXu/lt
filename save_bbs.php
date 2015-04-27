<?
include("inc/conn.php");//包含链接数据库文件
$url=$_POST["url"];
$bk=$_POST["bk"];
$tx=$_POST["tx"];
$title=$_POST["title"];
$content=$_POST["content"];
$username=$_POST["username"];//以上为得到表单传来的值
date_default_timezone_set("PRC");//设置时区
$time=date("Y-m-d");//得到日期
$act=$_GET["act"];//得到传来的动作值
//添加操作 
if($act=="add")//假如是添加动作
{
$sql="insert into bbs(bk_id,title,content,username,tx,bbs_date) values('$bk','$title','$content','$username','$tx','$time')";//构造插入帖子表的SQL语句
mysql_query($sql);//执行查询
mysql_query("update hy set jf=jf+1 where username='$username'");//更新会员积分
echo "<script>alert('Success！'); window.location.href='".$url."';</script>";//给出提示，然后转向
}
//回复帖子操作
if($act=="reply")//假如是回帖操作
{
$id=$_POST["id"];//得到ID值
$url=$_POST["url"];
$sql="insert into reply(username,bbs_id,content,tx,reply_date) values('$username','$id','$content','$tx','$time')";//构造插入回帖表的SQL语句
mysql_query($sql);//执行查询
mysql_query("update bbs set reply_count=reply_count+1 where bbs_id='$id'");//更新帖子表的回复数量
mysql_query("update hy set jf=jf+1 where username='$username'");//更新会员的积分
echo "<script>alert('Reply  Success！'); window.location.href='".$url."';</script>";//更新成功，弹出提示
}


//删除操作
if($act=="del")//如果是删除帖子操作
{
$id=$_GET["id"];//得到传来的ID值
$url=$_SERVER["HTTP_REFERER"];//
$sql="delete from bk where bk_id='$id'";//删除帖子的SQL语句
mysql_query($sql);//执行动作
echo "<script>alert('Has Been Deleted Successfully！'); window.location.href='".$url."';</script>";//删除成功给予提示
}
?>