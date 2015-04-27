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
<script>
function checkform()
{
    //
	if(form10.username.value=="")    
	{
        form10.username.focus();
        document.getElementById("div_username").innerHTML="Please type' your account!";
        return false;
    }
	else
	{
	  document.getElementById("div_username").innerHTML="";
	}
	//
	if(form10.password.value=="")    
	{
        form10.password.focus();
        document.getElementById("div_password").innerHTML="Please type password!";
        return false;
    }
	else
	{
	  if(form10.password.value.length<6)
	  {
	    document.getElementById("div_password").innerHTML="The length of password must large than 6!";
		form10.password.focus();
		return false;
	  }
	  document.getElementById("div_password").innerHTML="";
	}

	//
	if(form10.name.value=="")    
	{
        form10.name.focus();
        document.getElementById("div_name").innerHTML="Please type your name!";
        return false;
    }
	else
	{
	  document.getElementById("div_name").innerHTML="";
	}

	//
	if(form10.tel.value=="")    
	{
        form10.tel.focus();
        document.getElementById("div_tel").innerHTML="Please type your telephone number!";
        return false;
    }
	
	  else
	  {
	   document.getElementById("div_tel").innerHTML="";
	  }

	//
	if(form10.email.value=="")    
	{
        form10.email.focus();
        document.getElementById("div_email").innerHTML="Please type your email address!";
        return false;
    }
	else
	{
		 var strEmail = form10.email.value;  
		  var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		  var email_Flag = reg.test(strEmail);
		  if(!email_Flag)
		  {
		    document.getElementById("div_email").innerHTML="Please type right format!";
			form10.email.focus();
		   return false;
		  }
	  document.getElementById("div_email").innerHTML="";
	}
	//

   form10.submit();
}
</script>
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
    <td height="305" align="center" valign="middle"><table width="795" border="0" align="center" cellpadding="3" cellspacing="1" class="iborder">
      <form action="save_hy.php?act=add" method="post" name="form10" id="form10">
        <tr bgcolor="#FFFFFF">
          <td width="104"  height="31" align="right" class="text12">Account：</td>
          <td width="179"><input name="username" type="text" id="username" maxlength="35" /></td>
          <td width="488" align="left"><span id="div_username" style="margin:0;padding:0;width:100px; color:#FF0000; height:20px; font-size:12px"></span></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="30" align="right" class="text12">Password：</td>
          <td align="left" bgcolor="#FFFFFF"><input name="password" type="password" id="password"  maxlength="35" /></td>
          <td align="left" bgcolor="#FFFFFF"><span id="div_password" style="margin:0;padding:0;width:150px; color:#FF0000; height:20px; font-size:12px"></span></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="32" align="right" class="text12">Name：</td>
          <td align="left" bgcolor="#FFFFFF"><input name="name" type="text" id="name" maxlength="35" /></td>
          <td align="left" bgcolor="#FFFFFF"><span id="div_name" style="margin:0;padding:0;width:100px; color:#FF0000; height:20px; font-size:12px"></span></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="30" align="right" class="text12">Sex：</td>
          <td colspan="2" align="left" bgcolor="#FFFFFF" class="text12"><input name="sex" type="radio" value="male" checked>
            male
            <input type="radio" name="sex" value="female">
            female</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="31" align="right" class="text12">Telephone：</td>
          <td align="left" bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" maxlength="35" /></td>
          <td align="left" bgcolor="#FFFFFF"><span id="div_tel" style="margin:0;padding:0;width:150px; color:#FF0000; height:20px; font-size:12px"></span></td>
        </tr>

        <tr bgcolor="#FFFFFF">
          <td height="29" align="right" class="text12">E-mail：</td>
          <td align="left" bgcolor="#FFFFFF"><input name="email" type="text" id="email" maxlength="35" /></td>
          <td align="left" bgcolor="#FFFFFF"><span id="div_email" style="margin:0;padding:0;width:100px; color:#FF0000; height:20px; font-size:12px"></span></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="34" align="right">&nbsp;</td>
          <td height="34" colspan="2" align="left"><input name="ChangeAD" type="button" class="input1" value="Submit" onclick="checkform()">
            <input name="ChangeAD2" type="submit" class="input1" value="Reset" /></td>
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
include("copy.php");//包含版权文件
?>
</body>
</html>
