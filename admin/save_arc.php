<?
include("../inc/checkadmin.php");//������֤����Ա��¼�ļ�
include("../inc/conn.php");//�����������ݿ��ļ�
include("../inc/func.php");//�������ܺ����ļ�
$title=$_POST["title"];
$big=$_POST["big"];
$pic=$_POST["pic"];
$content=$_POST["content"];//�õ������ı�ֵ
date_default_timezone_set("PRC");//����ʱ��
$time=date("Y-m-d");//�õ�����ֵ
$act=$_GET['act'];//�õ������Ķ���ֵ
//��Ӳ��� 
if($act=="add")//��������Ӳ���
{
$sql="insert into arc(title,content,pic,news_date) values('$title','$content','$pic','$time')";//������빫���SQL���
mysql_query($sql);//ִ�в�ѯ
echo "<script>alert('Has Already Been Added��'); window.location.href='add_arc.php';</script>";//���������ɹ�����ʾ
}
//�༭����
if($act=="edit")//�����Ǳ༭����
{
$id=$_POST["id"];//�õ�������IDֵ
$url=$_POST["url"];//�õ�������URLֵ
$sql="update arc set title='$title',content='$content',pic='$pic',news_date='$news_date' where arc_id='$id'";//����༭��Ϣ��SQL���
mysql_query($sql);//ִ�в�ѯ
echo "<script>alert('Has Been Modified Successfully��'); window.location.href='".$url."';</script>";//���������ɹ�����ʾ
}

//ɾ������
if($act=="del")//������ɾ������
{
$id=$_GET["id"];//�õ�������IDֵ
$url=$_SERVER["HTTP_REFERER"];//�õ���һҳ�ĵ�ַ
$sql="delete from arc where arc_id='$id'";//����ɾ����SQL���
mysql_query($sql);//ִ�в���
echo "<script>alert('Has Been Deleted Successfully��'); window.location.href='".$url."';</script>";//�����ɹ�����ʾ
}

?>