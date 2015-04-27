<?
session_start();//开启session对话
include("inc/conn.php");//包含链接数据库文件
include("inc/func.php");//链接功能函数文件
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Indoorsman Froum</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #F3FCFB;
}
-->
</style></head>

<body>
<?
include("top.php");//包含头部文件
$key=$_GET["key"];//得到传来的值
?>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table1">
  <tr>
    <td height="33" background="images/lanmu_bj.jpg" class="black">&nbsp;&nbsp;Hot Topic Ranking</td>
  </tr>
  
  <tr>
    <td height="85" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="108" align="left" valign="middle">
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%" height="30" align="center" bgcolor="#F3FCFB" class="blue14">Serial Number</td>
            <td width="37%" align="center" bgcolor="#F3FCFB" class="blue14">Title</td>
            <td width="19%" align="center" bgcolor="#F3FCFB" class="blue14">Hair Post Person</td>
            <td width="17%" align="center" bgcolor="#F3FCFB" class="blue14">Post time</td>
            <td width="7%" align="center" bgcolor="#F3FCFB" class="blue14">Have Replies</td>
            <td width="7%" align="center" bgcolor="#F3FCFB" class="blue14">Page View </td>
          </tr>
		 <?php
$sql="select * from bbs where 1=1";	//构造一个查询帖子表的SQL语句
$sql=$sql." order by hits desc";//继续构造SQL语句
$num=mysql_num_rows(mysql_query($sql));//得到该语句执行的总行数
$pagesize=15;//设置一页显示多少行
$pagecount=ceil($num/$pagesize)-1;//得到页数总和

if(empty($_GET["page"]))
{
$page=0;
}//判断是否是第一页
else
{
$page=$_GET["page"];
}//不是第一页就是传来的页数
if($page<0)
{
$page=0;
}//十第一页就显示第一页
if($page>$pagecount)
{
$page=ceil($num/$pagesize)-1;
}//值大于总页数，那么显示传来值
$nextpage=$page+1;//页数加1
$prepage=$page-1;//设置上一页
$exec=$sql." limit ".($page*$pagesize).",$pagesize"; //构造SQL语句
$result=mysql_query($exec);//建立查询
if($num==0)
{
 echo "暂时没有信息";
}//没数据显示什么
else
{
while($rs=mysql_fetch_array($result))//建立一个循环显示数组的集合
{
 $i=$i+1;//累加器
?>
          <tr>
            <td height="28" align="center" class="black"><?=$i?></td>
            <td height="28" align="center" class="black"><a href="show_bbs.php?id=<?=$rs["bbs_id"]?>" class="text12"><?=$rs["title"]?></a></td>
            <td height="28" align="center" class="black"><?=$rs["username"]?></td>
            <td height="28" align="center" class="black"><?=date("Y-m-d",strtotime($rs["bbs_date"]))?></td>
            <td height="28" align="center" class="black"><?=$rs["reply_count"]?></td>
            <td height="28" align="center" class="black"><?=$rs["hits"]?></td>
          </tr>
<?
  }
}
?>
        </table>
		
		<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">
			<div align="center" class="text12">
Total<?=$num?>Record　Total<?=ceil($num/$pagesize)?>Page　The current Is<?=$page+1?>Page
<a href="?page=0" class="text12">First</a>
<?
if ($page==0) echo "<span class='text12'>Previous</span>";//显示上一页
else echo "<a href='?page=$prepage' class='text12'>Previous</a>";//上一页
?>
<?
if($page==$pagecount) echo "<span class='text12'>Next</span>";//显示下一页
else echo "<a href='?page=$nextpage' class='text12'>Next</a>"; //下一页
?>

<?
if($page==$pagecount) echo "<span class='text12'>Last</span>";//显示末页
else echo "<a href='?page=$pagecount' class='text12'>Last</a>";//以上是显示页码
?>

</div>
			</td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1" align="center" valign="middle" background="images/dot.gif"></td>
  </tr>
 
</table>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<?php
include("copy.php");
?>
</body>
</html>
