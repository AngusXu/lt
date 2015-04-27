<?php
session_start();//开启session对话
include("inc/conn.php");//包含链接数据库文件
include("inc/func.php");//链接功能函数文件
$username=$_POST["username"];
$password=$_POST["password"];//以上为得到传来的
$sql=mysql_query("select * from hy where username='$username' and password='$password'");//构造查询的SQL语句
$num=mysql_num_rows($sql);//得到查询的总行数
if($num==0)//假如行数为0
{
echo "<script>alert('Please enter the correct username and password！');window.location.href='index.php'</script>";//弹出登录错误的提示
exit;//退出该页面
}
else//假如登录成功
{
$rs=mysql_fetch_assoc($sql);//得到一个数据集合
$_SESSION["username"]=$rs["username"];//设置SESSION变量
mysql_free_result($sql);//释放资源
//判断是否从订单结算页面发出请求
echo "<script>alert('Success！');window.location.href='index.php'</script>";//弹出成功提示
}
mysql_free_result($sql);//释放资源
?>
