<?
session_start();//开启session对话
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
$user=$_POST["username"];
$password=$_POST["password"];//得到传来的账号和密码值

$query=mysql_query("select * from web_admin where web_admin='$user'");//在管理员表中查询是否有和账号对应的数据
if(mysql_num_rows($query)==0)//假如没有匹配的
{
echo "<script>alert('Please Enter A Valid Username And Password！');window.top.location.href='admin_login.php'</script>";//弹出不匹配的提示
}
else//假如有匹配账号的数据库
{
  $rs=mysql_fetch_assoc($query);//建立一个数据集合
  if($rs["password"]==$password)//假如集合中的密码和传来的密码值对应
    { 
     $_SESSION["adminname"]=$user;//设置SESSION值
	 $_SESSION["user_id"]=$rs["admin_id"];
	 echo "<script>window.location.href='index.php'</script>";//转向到管理页
	}
	else
	{
	 echo "<script>alert('Please Enter The Correct Password！');window.top.location.href='admin_login.php'</script>";//假如密码不匹配，那么弹出不匹配的提示
	}
}

?>