<?
session_start();//����session�Ի�
include("inc/conn.php");//�����������ݿ��ļ�
include("inc/func.php");//���ӹ��ܺ����ļ�
$id=$_GET["id"];//�õ�������IDֵ
$sql="select * from arc where arc_id='$id'";//����IDֵ�����ű����ѯ��Ӧ����
$query=mysql_query($sql);//ִ�в�ѯ
$rs=mysql_fetch_assoc($query);//������Ӧ�����ݼ���
$title=$rs["title"];//�õ����ݿ��еı���ֵ
$content=$rs["content"];//�õ�����
$big_id=$rs["big_id"];//�õ������ֵ
mysql_free_result($query);//�ͷ���Դ
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
include("top.php");//����ͷ���ļ�
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
            <?=$rs["content"]//��ʾ����?>
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
include("copy.php");//�����ײ��ļ�
?>
</body>
</html>
