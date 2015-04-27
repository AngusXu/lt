<?
session_start();//开启session对话
include("inc/conn.php");//包含链接数据库文件
include("inc/func.php");//链接功能函数文件
$id=$_GET["id"];//得到传来的ID值
$sql="select * from arc where arc_id='$id'";//根据ID值在新闻表里查询对应的行
$query=mysql_query($sql);//执行查询
$rs=mysql_fetch_assoc($query);//建立对应的数据集合
$title=$rs["title"];//得到数据库中的标题值
$content=$rs["content"];//得到内容
$big_id=$rs["big_id"];//得到大分类值
mysql_free_result($query);//释放资源
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
?>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table1">
  <tr>
    <td height="33" background="images/lanmu_bj.jpg">&nbsp;&nbsp;<span class="blue14">[Indoorsman Forum]</span></td>
  </tr>
  
  <tr>
    <td height="305" align="center" valign="top"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="37" align="center"><?=$rs["title"]?></td>
      </tr>
      <tr>
        <td height="37" class="text12" align="left"><div  class="text12" style='line-height:23px;'>
            <?=$rs["content"]//显示内容?>
        </div></td>
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
include("copy.php");//包含底部文件
?>
</body>
</html>
