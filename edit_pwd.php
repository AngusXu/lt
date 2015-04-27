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
include("top.php");//包含顶部头文件
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
    <td height="305" align="center" valign="middle"><table width="78%" border="0" align="center" class="border">
      <form action="save_pwd.php" method="post" name="myform">
        <tr>
          <td height="30" align="right" class="text12">The Original Password：</td>
          <td align="left" class="text12"><input name="oldpass" type="text" id="oldpass"></td>
        </tr>
        <tr>
          <td height="30" align="right" class="text12">The New Password：</td>
          <td align="left" class="text12"><input name="newpass" type="password" id="newpass"></td>
        </tr>
        <tr>
          <td height="30" align="right" class="text12">Confirm Password：</td>
          <td><span class="text12">
            <input name="ennewpass" type="password" id="ennewpass">
          </span></td>
        </tr>
        <tr>
          <td width="41%" height="30">&nbsp;</td>
          <td width="59%"><input type="Submit" name="Submit3" value="Submit">
              <input type="reset" name="Submit22" value="Reset"></td>
        </tr>
      </form>
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
