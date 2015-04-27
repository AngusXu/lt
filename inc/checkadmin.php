<?
session_start();//开启session对话
if(empty($_SESSION["adminname"]))//假如管理员未登录
{
echo "<script>alert('Please login！');window.top.location.href='login.php'</script>";//弹出提示
}
?> 
