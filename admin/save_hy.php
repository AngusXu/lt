<?
include("../inc/checkadmin.php");//������֤����Ա��¼�ļ�
include("../inc/conn.php");//�����������ݿ��ļ�
include("../inc/func.php");//�������ܺ����ļ�
$bk=$_POST["bk"];
$bk_ms=$_POST["bk_ms"];
$pic=$_POST["pic"];//����Ϊ�õ���������ֵ
$act=$_GET["act"];//�õ������Ķ���ֵ

//����༭����
if($act=="edit")//�����Ǳ༭����
{
$id=$_POST["id"];//�õ�������IDֵ
$sql="update bk set bk='$bk',pic='$pic',bk_ms='$bk_ms' where bk_id='$id'";//������°����SQL���
mysql_query($sql);//ִ�в�ѯ����
echo "<script>alert('Has Been Modified Successfully��'); window.location.href='manage_bk.php';</script>";//�����ɹ���ʾ
}


//ɾ������
if($act=="del")//������ɾ������
{
$id=$_GET["id"];//�õ�������IDֵ
$cx=mysql_query("select * from hy where user_id='$id'");//�ڻ�Ա����õ�����ID��ѯ����
$rs=mysql_fetch_assoc($cx);//ִ�в�ѯ����
$username=$rs["username"];//�õ����еĻ�Ա�˺�����
mysql_free_result($cx);//�ͷ���Դ
$url=$_SERVER["HTTP_REFERER"];//�õ���һҳ��ַ
$sql="delete from hy where user_id='$id'";//ɾ����ӦID�Ļ�Ա���ϵ�SQL���
mysql_query($sql);//ִ�в�ѯ
mysql_query("delete from bbs where username='$username'");//����ɾ���û�Ա���������
echo "<script>alert('Has Been Deleted Successfully��'); window.location.href='".$url."';</script>";//����ɾ���ɹ�����ʾ
}
//��������
if($act=="lock")//�������������
{
  $url=$_SERVER['HTTP_REFERER'];//�õ���һҳ��ַ
  $id=$_GET["id"];//�õ�������IDֵ
  $value=$_GET["result"];//�õ�����������ֵ
  $sql="update hy set is_lock='$value' where user_id='$id'";//������±��SQL���
  mysql_query($sql);//ִ����������
  echo "<script>window.location.href='".$url."';</script>";//������һҳ
}
?>