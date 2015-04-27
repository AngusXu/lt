<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
?>
<html>
<head>
<title></title>
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
            <td width="319" align="center"><strong>Title</strong></td>
            <td align="center"  width=186>Section</td>
            <td align="center"  width=161>Release Time</td>
            <td width="111" align="center" ><strong>Account</strong></td>
            <td width="94" align="center" >If the Top</td>
            <td width="90" align="center" ><strong>Operation</strong></td>
          </tr>
          <?php


$sql="select * from bbs where 1=1";
$sql=$sql." order by bbs_id desc";
$q_tj=mysql_query($sql);
while($rst=mysql_fetch_array($q_tj))
{
   $sum=$rst["sf"]+$sum;
}
mysql_free_result($q_tj);
//
$num=mysql_num_rows(mysql_query($sql));
$pagesize=15;
$pagecount=ceil($num/$pagesize)-1;

if(empty($_GET["page"]))
{
$page=0;
}
else
{
$page=$_GET["page"];
}
if($page<0)
{
$page=0;
}
if($page>$pagecount)
{
$page=ceil($num/$pagesize)-1;
}
$nextpage=$page+1;
$prepage=$page-1;
$exec=$sql." limit ".($page*$pagesize).",$pagesize"; 
$result=mysql_query($exec);
if($num==0)
{
 echo "<tr><td colspan=7>no information</td></tr>";
}
else
{
while($rs=mysql_fetch_array($result))
{
?>
          <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'"> 
            <td height="24" align="center"><?=$rs["bbs_id"]?></td>
            <td align="center"><?=$rs["title"]?></td>
            <td align="center">
			<?
			$cx=mysql_query("select * from bk where bk_id='".$rs["bk_id"]."'");
			$rst=mysql_fetch_assoc($cx);
			echo $rst["bk"];
			mysql_free_result($cx);
			?>			</td>
            <td align="center"><?=date("Y-m-d",strtotime($rs["bbs_date"]))?></td>
            <td width="111" align="center"><?=$rs["username"]?></td>
            <td width="94" align="center">
			 <?php
	  //判断是否推荐到首页
	  if($rs["is_zd"]==1){
	  echo "<a href='save_bbs.php?act=zd&value=0&id=".$rs["bbs_id"]."'><img src='images/icon_01.gif' border=0></a>";
	  }
	  else{
	  echo "<a href='save_bbs.php?act=zd&value=1&id=".$rs["bbs_id"]."'><img src='images/icon_02.gif' border=0></a>";
	  }
	  ?>	
			</td>
            <td width="90" align="center"><a href="save_bbs.php?act=del&id=<?=$rs["bbs_id"]?>" onClick="{if(confirm('Sure To Delete It?')){return true;}return false;}"><font color="#000000">Delete</font></a></td>
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
