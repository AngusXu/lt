<?php
session_start();//����session�Ի�
include("inc/conn.php");//�����������ݿ��ļ�
include("inc/func.php");//���ӹ��ܺ����ļ�
$username=$_POST["username"];
$password=$_POST["password"];//����Ϊ�õ�������
$sql=mysql_query("select * from hy where username='$username' and password='$password'");//�����ѯ��SQL���
$num=mysql_num_rows($sql);//�õ���ѯ��������
if($num==0)//��������Ϊ0
{
echo "<script>alert('Please enter the correct username and password��');window.location.href='index.php'</script>";//������¼�������ʾ
exit;//�˳���ҳ��
}
else//�����¼�ɹ�
{
$rs=mysql_fetch_assoc($sql);//�õ�һ�����ݼ���
$_SESSION["username"]=$rs["username"];//����SESSION����
mysql_free_result($sql);//�ͷ���Դ
//�ж��Ƿ�Ӷ�������ҳ�淢������
echo "<script>alert('Success��');window.location.href='index.php'</script>";//�����ɹ���ʾ
}
mysql_free_result($sql);//�ͷ���Դ
?>
