<?
include("inc/conn.php");//�����������ݿ��ļ�
$url=$_POST["url"];
$bk=$_POST["bk"];
$tx=$_POST["tx"];
$title=$_POST["title"];
$content=$_POST["content"];
$username=$_POST["username"];//����Ϊ�õ���������ֵ
date_default_timezone_set("PRC");//����ʱ��
$time=date("Y-m-d");//�õ�����
$act=$_GET["act"];//�õ������Ķ���ֵ
//��Ӳ��� 
if($act=="add")//��������Ӷ���
{
$sql="insert into bbs(bk_id,title,content,username,tx,bbs_date) values('$bk','$title','$content','$username','$tx','$time')";//����������ӱ��SQL���
mysql_query($sql);//ִ�в�ѯ
mysql_query("update hy set jf=jf+1 where username='$username'");//���»�Ա����
echo "<script>alert('Success��'); window.location.href='".$url."';</script>";//������ʾ��Ȼ��ת��
}
//�ظ����Ӳ���
if($act=="reply")//�����ǻ�������
{
$id=$_POST["id"];//�õ�IDֵ
$url=$_POST["url"];
$sql="insert into reply(username,bbs_id,content,tx,reply_date) values('$username','$id','$content','$tx','$time')";//�������������SQL���
mysql_query($sql);//ִ�в�ѯ
mysql_query("update bbs set reply_count=reply_count+1 where bbs_id='$id'");//�������ӱ�Ļظ�����
mysql_query("update hy set jf=jf+1 where username='$username'");//���»�Ա�Ļ���
echo "<script>alert('Reply  Success��'); window.location.href='".$url."';</script>";//���³ɹ���������ʾ
}


//ɾ������
if($act=="del")//�����ɾ�����Ӳ���
{
$id=$_GET["id"];//�õ�������IDֵ
$url=$_SERVER["HTTP_REFERER"];//
$sql="delete from bk where bk_id='$id'";//ɾ�����ӵ�SQL���
mysql_query($sql);//ִ�ж���
echo "<script>alert('Has Been Deleted Successfully��'); window.location.href='".$url."';</script>";//ɾ���ɹ�������ʾ
}
?>