<?
include("inc/conn.php");//包含链接数据库文件
include("inc/func.php");//链接功能函数文件
$username=$_POST["username"];
$password=$_POST["password"];
$name=$_POST["name"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$sex=$_POST["sex"];
$address=$_POST["address"];//以上为得到表单传来的数据
date_default_timezone_set("PRC");//设置时区
$time=date("Y-m-d");//得到日期
$act=$_GET["act"];//得到传来的动作值
//添加操作
if($act=='add')//假如是添加动作
{
    $num=exist_member($username);//调用函数，作用是检测会员号是否已经注册
     if($num==0)//假如未注册
     {
       $sql="insert into hy(username,password,name,sex,telephone,email,create_date) values('$username','$password','$name','$sex','$tel','$email','$time')";//插入会员的SQL语句
       $query=mysql_query($sql);//执行查询
       echo "<script>alert('The Success Of The Registration, Please Login！'); window.location.href='index.php';</script>"; //弹出注册成功提示
    }
    else
    {
     echo "<script>alert('The Account Already Exists, Please Input Again！'); window.location.href='reg.php';</script>"; //如果已经注册，弹出已经注册过该号码提示
    }
}
//修改操作
if($act=='edit')//假如是修改动作
{
  $id=$_POST["id"];//得到传来的ID值
  $sql="update hy set name='$name',sex='$sex',telephone='$tel',email='$email' where user_id='$id'";//更新会员资料的SQL语句
  $query=mysql_query($sql);//执行更新动作
  echo "<script>alert('Successful Modification！'); window.location.href='edit_info.php';</script>";//弹出更新成功的提示
}



?>