<?
session_start();//����session�Ի�
include("../inc/conn.php");//�����������ݿ��ļ�
include("../inc/func.php");//�������ܺ����ļ�
$user=$_POST["username"];
$password=$_POST["password"];//�õ��������˺ź�����ֵ

$query=mysql_query("select * from web_admin where web_admin='$user'");//�ڹ���Ա���в�ѯ�Ƿ��к��˺Ŷ�Ӧ������
if(mysql_num_rows($query)==0)//����û��ƥ���
{
echo "<script>alert('Please Enter A Valid Username And Password��');window.top.location.href='admin_login.php'</script>";//������ƥ�����ʾ
}
else//������ƥ���˺ŵ����ݿ�
{
  $rs=mysql_fetch_assoc($query);//����һ�����ݼ���
  if($rs["password"]==$password)//���缯���е�����ʹ���������ֵ��Ӧ
    { 
     $_SESSION["adminname"]=$user;//����SESSIONֵ
	 $_SESSION["user_id"]=$rs["admin_id"];
	 echo "<script>window.location.href='index.php'</script>";//ת�򵽹���ҳ
	}
	else
	{
	 echo "<script>alert('Please Enter The Correct Password��');window.top.location.href='admin_login.php'</script>";//�������벻ƥ�䣬��ô������ƥ�����ʾ
	}
}

?>