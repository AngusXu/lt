<?
session_start();//����session�Ի�
include("inc/conn.php");//�����������ݿ��ļ�
$oldpass=$_POST["oldpass"];
$password=$_POST["newpass"];
$username=$_SESSION["username"];//����Ϊ�õ������ı�ֵ
$cx=mysql_query("select * from hy where username='$username' and password='$oldpass'");//�ڻ�Ա���в�ѯ�˺ź;������Ƿ�ƥ��
$num=mysql_num_rows($cx);//�õ�Ӱ�������
if($num)//������������0
{
$query=mysql_query("update hy set password='$newpass' where username='$username'");//ִ�и����������
echo "<script>alert('Password Updated Successfully��');window.top.location.href='edit_pwd.php'</script>";//����ִ�гɹ���ʾ
}
else
{
echo "<script>alert('The Old Password Input Error, Please Input Again��');window.top.location.href='edit_pwd.php'</script>";//������������벻ƥ����ʾ
}

?>
