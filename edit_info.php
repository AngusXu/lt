<?
session_start();//����session�Ի�
include("inc/conn.php");//�����������ݿ��ļ�
include("inc/func.php");//���ӹ��ܺ����ļ�
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
include("top.php");//����ͷ��ҳ��
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
    <td height="305" align="center" valign="middle">
	<?
	$username=$_SESSION["username"];//�õ�SESSION����
	$sql="select * from hy where username='$username'";//�ӻ�Ա�����ѯ��Ӧ��Ա������
	$query=mysql_query($sql);//������ѯ
	$rs=mysql_fetch_assoc($query);//����һ�����ݼ���
	?>
	<table width="598" border="0" align="center" cellpadding="3" cellspacing="1" class="iborder">
      <form action="save_hy.php?act=edit" method="post" name="form10" id="form10">
	  <input type="hidden" name="id" value="<?=$rs["user_id"]?>">
        <tr bgcolor="#FFFFFF">
          <td width="136"  height="31" align="right" class="text12">Account��</td>
          <td width="447"><input name="username" type="text" id="username" maxlength="35" value="<?=$rs["username"]//�����ı���ֵ?>" readonly></td>
        </tr>
        
        <tr bgcolor="#FFFFFF">
          <td height="32" align="right" class="text12">Name��</td>
          <td align="left" bgcolor="#FFFFFF"><input name="name" type="text" id="name" maxlength="35" value="<?=$rs["name"]?>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="33" align="right" class="text12">Sex��</td>
          <td align="left" bgcolor="#FFFFFF" class="text12"><input name="sex" type="radio" value="male" <? if($rs["sex"]=="male") echo "checked"?>>
            male
            <input type="radio" name="sex" value="female" <? if($rs["sex"]=="female") echo "checked"?>>
            female</td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="31" align="right" class="text12">Telephone��</td>
          <td align="left" bgcolor="#FFFFFF"><input name="tel" type="text" id="tel" maxlength="35" value="<?=$rs["telephone"]?>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="29" align="right" class="text12">E_mail��</td>
          <td align="left" bgcolor="#FFFFFF"><input name="email" type="text" id="email" maxlength="35" value="<?=$rs["email"]?>"></td>
        </tr>
        <tr bgcolor="#FFFFFF">
          <td height="34" align="right">&nbsp;</td>
          <td height="34" align="left"><input name="ChangeAD" type="submit" class="input1" value="Submit" />
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
include("copy.php");
?>
</body>
</html>
