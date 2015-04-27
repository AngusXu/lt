<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
?>
<html>
<head>
<title>management</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<link rel="stylesheet" type="text/css" href="Admin_Style.css">
</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg"> 
    <td height="22" colspan="2"  align="center">&nbsp;</td>
  </tr>
  <tr class="tdbg"> 
    <td width="70" height="30" >&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tr>
        <td height="15" align="right"></td>
      </tr>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tr>
        <td height="10" align="right"></td>
      </tr>
</table>
<table width='80%' border="0" cellpadding="0" cellspacing="0" align=center><tr>
   
     <td><table class="border" border="0" cellspacing="1" width="100%" cellpadding="0">
          <tr class="title" height="22"> 
            <td width="95" height="22" align="center"><strong>ID</strong></td>
            <td align="center"  width=180><strong>Account</strong></td>
            <td align="center"  width=181>Password</td>
            <td align="center"  width=185>Name</td>
            <td align="center"  width=149>Sex</td>
            <td width="131" align="center" ><strong>State</strong></td>
            <td width="135" align="center" ><strong>Operation</strong></td>
          </tr>
          <?php


$sql="select * from hy where 1=1";//构造查询会员表的SQL语句
$sql=$sql." order by user_id desc";//拼接SQL语句
$q_tj=mysql_query($sql);//执行查询
while($rst=mysql_fetch_array($q_tj))
{
   $sum=$rst["sf"]+$sum;
}
mysql_free_result($q_tj);//释放资源
//
$num=mysql_num_rows(mysql_query($sql));//得到数据总数
$pagesize=15;//设置一页有多少数据
$pagecount=ceil($num/$pagesize)-1;//得到总页数

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
}//是第一页就显示第一页
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
 echo "<tr><td colspan=7>暂时没有信息</td></tr>";
}//没数据显示什么
else
{
while($rs=mysql_fetch_array($result))
{
?>
          <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'"> 
            <td height="24" align="center"><?=$rs["user_id"]//从表中读出字段数据?></td>
            <td align="center"><?=$rs["username"]?></td>
            <td align="center"><?=$rs["password"]?></td>
            <td align="center"><?=$rs["name"]?></td>
            <td align="center"><?=$rs["sex"]//以上为读出表中字段的值?></td>
            <td width="131" align="center">
			<?
			if($rs["is_lock"]==0)//假如表中锁定值字段是0
			{
			  echo "Normal";//那么显示会员没锁定
			}
			if($rs["is_lock"]==1)//假如表中锁定字段值是1
			{
			  echo "<font color=red>Lock</font>";//显示会员被锁定
			}
			?>
			</td>
            <td width="135" align="center"><a href="save_hy.php?act=del&id=<?=$rs["user_id"]?>" onClick="{if(confirm('Sure To Delete It?')){return true;}return false;}"><font color="#000000">Delete</font></a> </td>
          </tr>
<?
}
}
?>
		 
            </table></td>
	    </tr>
		  <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'">
			<td align=center  colspan=7  height=30>
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

</div>			</td>
		  </tr>
        </table>

</td>
</tr></table>
</body>
</html>
