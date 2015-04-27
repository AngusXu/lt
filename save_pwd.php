<?
session_start();//开启session对话
include("inc/conn.php");//包含链接数据库文件
$oldpass=$_POST["oldpass"];
$password=$_POST["newpass"];
$username=$_SESSION["username"];//以上为得到传来的表单值
$cx=mysql_query("select * from hy where username='$username' and password='$oldpass'");//在会员表中查询账号和旧密码是否匹配
$num=mysql_num_rows($cx);//得到影响的行数
if($num)//假如行数大于0
{
$query=mysql_query("update hy set password='$newpass' where username='$username'");//执行更新密码操作
echo "<script>alert('Password Updated Successfully！');window.top.location.href='edit_pwd.php'</script>";//给出执行成功提示
}
else
{
echo "<script>alert('The Old Password Input Error, Please Input Again！');window.top.location.href='edit_pwd.php'</script>";//否则给出旧密码不匹配提示
}

?>
