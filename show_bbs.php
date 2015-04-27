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
$id=$_GET["id"];//得到传来的ID值
mysql_query("update bbs set hits=hits+1 where bbs_id='$id'");//更新该帖子的点击值
$cx=mysql_query("select * from bbs where bbs_id='$id'");//根据ID值查询该帖子
$rs=mysql_fetch_assoc($cx);//建立数据集合
$title=$rs["title"];//得到标题
$tx=$rs["tx"];//得到头像
$hits=$rs["hits"];//得到点击量
$bk_id=$rs["bk_id"];//得到版块ID
$content=$rs["content"];//得到内容
$username1=$rs["username"];//得到会员账号
$bbs_date=$rs["bbs_date"];//得到发布日期
mysql_free_result($cx);

//

$sql="select * from bk where bk_id='$bk_id'";//构造SQL参数
$query=mysql_query($sql);
$rs=mysql_fetch_assoc($query);//根据查询建立一个数据集合
$bk=$rs["bk"];//得到版块名称
mysql_free_result($query);//释放资源
//
?>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table1">
  <tr>
    <td height="33" background="images/lanmu_bj.jpg">&nbsp;&nbsp;<span class="blue14">[<?=$bk?>] <a href="ft.php?id=<?=$id?>" class="text12">I Want To Post</a> </span></td>
  </tr>
  
  <tr>
    <td height="85" align="center" valign="middle">
	
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="33" class="text12">Title：<?=$title?> <span class="red12">The landlord：</span><?=$username1?> Post Time：<?=date("Y-m-d",strtotime($bbs_date))?> Expression：<img src="face/<?=$tx?>.gif" name="tx_img" width="19" height="19" id=tx_img> The Quantity That Browse：<?=$hits?> The Grade Of Membership:<?=turndj($username1)?></td>
          </tr>
          <tr>
            <td height="65" bgcolor="#EEF3F7"><div class="text12" style='line-height:23px;'><?=$content?></div></td>
          </tr>
        </table>
<!--回复-->
<?
$cx=mysql_query("select * from reply where bbs_id='$id' order by reply_id desc");//根据主贴ID查询出所有回帖
while($rst=mysql_fetch_array($cx))//建立一个循环数据集合
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="33" class="text12"><span class="red12">Hair Post Person：</span><?=$rst["username"]?> Reply Time：<?=date("Y-m-d",strtotime($rst["reply_date"]))?>               Expression：<img src="face/<?=$rst["tx"]?>.gif" name="tx_img" width="19" height="19" id=tx_img> The Grade Of Membership：<?=turndj($rst["username"])?></td>
          </tr>
          <tr>
            <td height="65" bgcolor="#EEF3F7"><div class="text12" style='line-height:23px;'><?=$rst["content"]?></div></td>
          </tr>
        </table>
<?
}//作用是循环出所有回帖
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" class="text12"><a href="reply.php?id=<?=$id?>" class="red12">I Want To Reply</a></td>
  </tr>
</table>
<!--回复结束-->
		</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="2" align="center" valign="middle" background="images/dot.gif"></td>
  </tr>
 
</table>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<?php
include("copy.php");//包含版权文件
?>
</body>
</html>
