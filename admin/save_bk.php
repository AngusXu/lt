<?
include("../inc/checkadmin.php");//������֤����Ա��¼�ļ�
include("../inc/conn.php");//�����������ݿ��ļ�
include("../inc/func.php");//�������ܺ����ļ�
$bk=$_POST["bk"];
$bk_ms=$_POST["bk_ms"];
$pic=$_POST["pic"];
$act=$_GET["act"];//����Ϊ�õ���һҳ�����ı�ֵ
//��Ӳ��� 
if($act=="add")//��������Ӳ���
{
$sql="insert into bk(bk,bk_ms,pic) values('$bk','$bk_ms','$pic')";//����������SQL���
mysql_query($sql);//ִ�в�ѯ
echo "<script>alert('Has Already Been Added��'); window.location.href='add_bk.php';</script>";//���������ɹ�����ʾ
}
//����༭����
if($act=="edit")//�����Ǳ༭����
{
$id=$_POST["id"];//�õ�������IDֵ
$sql="update bk set bk='$bk',pic='$pic',bk_ms='$bk_ms' where bk_id='$id'";//���°����SQL���
mysql_query($sql);//ִ�в�ѯ
echo "<script>alert('Has Been Modified Successfully��'); window.location.href='manage_bk.php';</script>";//���������ɹ�����ʾ
}


//ɾ������
if($act=="del")//������ɾ������
{
$id=$_GET["id"];//�õ�������IDֵ
$url=$_SERVER["HTTP_REFERER"];//�õ���������һҳ��ַ
$sql="delete from bk where bk_id='$id'";//�ڰ�ձ���ɾ����ӦID��SQL���
mysql_query($sql);//ִ�в�ѯ
$sql="delete from bbs where bk_id='$id'";//ɾ�����ӱ��ж�Ӧ���ID��SQL���
 mysql_query($sql);//ִ�в�ѯ
echo "<script>alert('Has Been Deleted Successfully��'); window.location.href='".$url."';</script>";//����ɾ���ɹ�����ʾ
}
?>