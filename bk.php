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
include("top.php");
$id=$_GET["id"];//��������ID����
$sql="select * from bk where bk_id='$id'";//����SQL����
$query=mysql_query($sql);
$rs=mysql_fetch_assoc($query);//���ݲ�ѯ����һ�����ݼ���
$bk=$rs["bk"];
mysql_free_result($query);//�ͷ���Դ
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
    <td height="85" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="108" align="left" valign="middle">
		
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="13%" height="30" align="center" bgcolor="#F3FCFB" class="blue14">Serial Number</td>
            <td width="37%" align="center" bgcolor="#F3FCFB" class="blue14">Title</td>
            <td width="19%" align="center" bgcolor="#F3FCFB" class="blue14">Hair Post Person</td>
            <td width="17%" align="center" bgcolor="#F3FCFB" class="blue14">Post time</td>
            <td width="14%" align="center" bgcolor="#F3FCFB" class="blue14">Have Replies</td>
          </tr>
		 <?php
 $execc="select count(*) from bbs where bk_id='$id'";//����ͳ�ư汾���ӵ�SQL���
$resultc=mysql_query($execc);//������ѯ
$rsc=mysql_fetch_array($resultc);//�������ݼ���
$num=$rsc[0];//�õ���������
$pagesize=15;//����һҳ�ж�������
$pagecount=ceil($num/$pagesize)-1;//�õ���ҳ��

if(empty($_GET["page"]))
{
$page=0;
}//�ж��Ƿ��ǵ�һҳ
else
{
$page=$_GET["page"];
}//���ǵ�һҳ���Ǵ�����ҳ��
if($page<0)
{
$page=0;
}//�ǵ�һҳ����ʾ��һҳ
if($page>$pagecount)
{
$page=ceil($num/$pagesize)-1;
}//ֵ������ҳ������ô��ʾ����ֵ
$nextpage=$page+1;//ҳ����1
$prepage=$page-1;//������һҳ
$exec="select * from bbs where bk_id='$id' order by is_zd desc,bbs_id desc limit ".($page*$pagesize).",$pagesize"; //����SQL���

$result=mysql_query($exec);//������ѯ
if($num==0)
{
 echo "no information";
}//û������ʾʲô
else
{
while($rs=mysql_fetch_array($result))
{
 $i=$i+1;
?>
          <tr>
            <td height="28" align="center" class="black"><?=$i?></td>
            <td height="28" align="center" class="black"><a href="show_bbs.php?id=<?=$rs["bbs_id"]?>" class="text12"><?=$rs["title"]?></a></td>
            <td height="28" align="center" class="black"><?=$rs["username"]?></td>
            <td height="28" align="center" class="black"><?=date("Y-m-d",strtotime($rs["bbs_date"]))?></td>
            <td height="28" align="center" class="black"><?=$rs["reply_count"]?></td>
          </tr>
<?
  }
}
?>
        </table>
		
		<table width="100%" height="31" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center">
			<div align="center" class="text12">
Total<?=$num?>Record��Total<?=ceil($num/$pagesize)?>Page��The current Is<?=$page+1?>Page
<a href="?page=0" class="text12">First</a>
<?
if ($page==0) echo "<span class='text12'>Previous</span>";//��ʾ��һҳ
else echo "<a href='?page=$prepage' class='text12'>Previous</a>";//��һҳ
?>
<?
if($page==$pagecount) echo "<span class='text12'>Next</span>";//��ʾ��һҳ
else echo "<a href='?page=$nextpage' class='text12'>Next</a>"; //��һҳ
?>

<?
if($page==$pagecount) echo "<span class='text12'>Last</span>";//��ʾĩҳ
else echo "<a href='?page=$pagecount' class='text12'>Last</a>";//��������ʾҳ��
?>

</div>
			</td>
          </tr>
        </table></td>
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
include("copy.php");
?>
</body>
</html>
