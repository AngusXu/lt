<?
include("../inc/checkadmin.php");//������֤����Ա��¼�ļ�
include("../inc/conn.php");//�����������ݿ��ļ�
include("../inc/func.php");//�������ܺ����ļ�
?>
<html>
<head>
<title>management</title>
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
            <td align="center"  width=180><strong>Account</strong></td>
            <td align="center"  width=181>Password</td>
            <td align="center"  width=185>Name</td>
            <td align="center"  width=149>Sex</td>
            <td width="131" align="center" ><strong>State</strong></td>
            <td width="135" align="center" ><strong>Operation</strong></td>
          </tr>
          <?php


$sql="select * from hy where 1=1";//�����ѯ��Ա���SQL���
$sql=$sql." order by user_id desc";//ƴ��SQL���
$q_tj=mysql_query($sql);//ִ�в�ѯ
while($rst=mysql_fetch_array($q_tj))
{
   $sum=$rst["sf"]+$sum;
}
mysql_free_result($q_tj);//�ͷ���Դ
//
$num=mysql_num_rows(mysql_query($sql));//�õ���������
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
$exec=$sql." limit ".($page*$pagesize).",$pagesize"; //����SQL���
$result=mysql_query($exec);//������ѯ
if($num==0)
{
 echo "<tr><td colspan=7>��ʱû����Ϣ</td></tr>";
}//û������ʾʲô
else
{
while($rs=mysql_fetch_array($result))
{
?>
          <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'"> 
            <td height="24" align="center"><?=$rs["user_id"]//�ӱ��ж����ֶ�����?></td>
            <td align="center"><?=$rs["username"]?></td>
            <td align="center"><?=$rs["password"]?></td>
            <td align="center"><?=$rs["name"]?></td>
            <td align="center"><?=$rs["sex"]//����Ϊ���������ֶε�ֵ?></td>
            <td width="131" align="center">
			<?
			if($rs["is_lock"]==0)//�����������ֵ�ֶ���0
			{
			  echo "Normal";//��ô��ʾ��Աû����
			}
			if($rs["is_lock"]==1)//������������ֶ�ֵ��1
			{
			  echo "<font color=red>Lock</font>";//��ʾ��Ա������
			}
			?>
			</td>
            <td width="135" align="center"><a href="save_hy.php?act=del&id=<?=$rs["user_id"]?>" onClick="{if(confirm('Sure To Delete It?')){return true;}return false;}"><font color="#000000">Delete</font></a> </td>
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

</div>			</td>
		  </tr>
        </table>

</td>
</tr></table>
</body>
</html>
