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
include("top.php");//���������ļ�
?>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table1">
  <tr>
    <td height="33" colspan="2" background="images/lanmu_bj.jpg">&nbsp;&nbsp;<span class="blue14">Site Notice</span></td>
  </tr>
  <?
  $sql="select * from arc order by arc_id desc";//����һ����ѯ�����SQL���
  $query=mysql_query($sql);//����һ����ѯ
  while($rs=mysql_fetch_array($query))//����һ��ѭ�������ݼ���
  {
  ?>
  <tr>
    <td width="38" height="25" align="left" valign="middle" class="text12">&nbsp;</td>
    <td width="920" align="left" valign="middle" class="text12"><a href="show_arc.php?id=<?=$rs["arc_id"]?>" class="text12"><?=$rs["title"]?></a> [<?=date("Y-m-d",strtotime($rs["news_date"]))?>]</td>
  </tr>
  <tr>
    <td height="1" colspan="2" align="center" valign="middle" background="images/dot.gif"></td>
  </tr>
  <?
  }
  mysql_free_result($query);//�ͷ���Դ
  ?>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table1">
  <tr>
    <td height="33" background="images/lanmu_bj.jpg">&nbsp;&nbsp;<span class="blue14">[Popular Topic]</span></td>
  </tr>
  <?
  $sql="select * from bk order by bk_id desc";//�������ѯSQL���
  $query=mysql_query($sql);//����һ����ѯ
  while($rs=mysql_fetch_array($query))//����һ��ѭ�������ݼ���
  {
  ?>
  <tr>
    <td height="85" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="33%" height="108" align="center"><img src="<?=$rs["pic"]?>" width="198" height="99"></td>
        <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
      <td height="32" align="left" class="blue14">The Name Of The Section��<a href="bk.php?id=<?=$rs["bk_id"]?>" class="black"><?=$rs["bk"]?></a> The Total Number Of Posts��
			<?
			$cx=mysql_query("select * from bbs where bk_id='".$rs["bk_id"]."'");//����һ����ѯ�ְ���SQL���
			$num=mysql_num_rows($cx);//�õ�������
			echo $num;//��ҳ����ʾ������
			mysql_free_result($cx);//�ͷ���Դ
			?>
			</td>
          </tr>
          <tr>
            <td height="89" valign="middle"><div class="black" style='line-height:23px;'><?=$rs["bk_ms"]?></div></td>
          </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1" align="center" valign="middle" background="images/dot.gif"></td>
  </tr>
  <?
  }
  ?>
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
