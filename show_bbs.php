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
include("top.php");//����ͷ���ļ�
$id=$_GET["id"];//�õ�������IDֵ
mysql_query("update bbs set hits=hits+1 where bbs_id='$id'");//���¸����ӵĵ��ֵ
$cx=mysql_query("select * from bbs where bbs_id='$id'");//����IDֵ��ѯ������
$rs=mysql_fetch_assoc($cx);//�������ݼ���
$title=$rs["title"];//�õ�����
$tx=$rs["tx"];//�õ�ͷ��
$hits=$rs["hits"];//�õ������
$bk_id=$rs["bk_id"];//�õ����ID
$content=$rs["content"];//�õ�����
$username1=$rs["username"];//�õ���Ա�˺�
$bbs_date=$rs["bbs_date"];//�õ���������
mysql_free_result($cx);

//

$sql="select * from bk where bk_id='$bk_id'";//����SQL����
$query=mysql_query($sql);
$rs=mysql_fetch_assoc($query);//���ݲ�ѯ����һ�����ݼ���
$bk=$rs["bk"];//�õ��������
mysql_free_result($query);//�ͷ���Դ
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
            <td height="33" class="text12">Title��<?=$title?> <span class="red12">The landlord��</span><?=$username1?> Post Time��<?=date("Y-m-d",strtotime($bbs_date))?> Expression��<img src="face/<?=$tx?>.gif" name="tx_img" width="19" height="19" id=tx_img> The Quantity That Browse��<?=$hits?> The Grade Of Membership:<?=turndj($username1)?></td>
          </tr>
          <tr>
            <td height="65" bgcolor="#EEF3F7"><div class="text12" style='line-height:23px;'><?=$content?></div></td>
          </tr>
        </table>
<!--�ظ�-->
<?
$cx=mysql_query("select * from reply where bbs_id='$id' order by reply_id desc");//��������ID��ѯ�����л���
while($rst=mysql_fetch_array($cx))//����һ��ѭ�����ݼ���
{
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="33" class="text12"><span class="red12">Hair Post Person��</span><?=$rst["username"]?> Reply Time��<?=date("Y-m-d",strtotime($rst["reply_date"]))?>               Expression��<img src="face/<?=$rst["tx"]?>.gif" name="tx_img" width="19" height="19" id=tx_img> The Grade Of Membership��<?=turndj($rst["username"])?></td>
          </tr>
          <tr>
            <td height="65" bgcolor="#EEF3F7"><div class="text12" style='line-height:23px;'><?=$rst["content"]?></div></td>
          </tr>
        </table>
<?
}//������ѭ�������л���
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" class="text12"><a href="reply.php?id=<?=$id?>" class="red12">I Want To Reply</a></td>
  </tr>
</table>
<!--�ظ�����-->
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
include("copy.php");//������Ȩ�ļ�
?>
</body>
</html>
