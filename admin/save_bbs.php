<?
include("../inc/checkadmin.php");//������֤����Ա��¼�ļ�
include("../inc/conn.php");//�����������ݿ��ļ�
include("../inc/func.php");//�������ܺ����ļ�
$act=$_GET["act"];//�õ������Ķ���ֵ


//ɾ������
if($act=="del")//������ɾ����ֵ
{
  $id=$_GET["id"];//�õ�������IDֵ
  $url=$_SERVER['HTTP_REFERER'];//�õ���������һҳ����ֵ
  $sql="delete from bbs where bbs_id='$id'";//����ɾ�����ӱ��SQL���
  mysql_query($sql);//ִ�в�ѯ
  echo "<script>alert('Has Been Deleted Successfully��'); window.location.href='".$url."';</script>";//����ɾ���ɹ�����ʾ
}
//�ö�����
if($act=="zd")//�������ö�����
{
  $url=$_SERVER['HTTP_REFERER'];//�õ���һҳ�ĵ�ַ
  $id=$_GET["id"];//�õ�������IDֵ
  $value=$_GET["value"];//�õ�����������ֵ
  $sql="update bbs set is_zd='$value' where bbs_id='$id'";//��������BBS�ö�ֵ��SQL���
  mysql_query($sql);//ִ�в�ѯ
  echo "<script>window.location.href='".$url."';</script>";//������һҳ
}
?>