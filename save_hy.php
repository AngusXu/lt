<?
include("inc/conn.php");//�����������ݿ��ļ�
include("inc/func.php");//���ӹ��ܺ����ļ�
$username=$_POST["username"];
$password=$_POST["password"];
$name=$_POST["name"];
$tel=$_POST["tel"];
$email=$_POST["email"];
$sex=$_POST["sex"];
$address=$_POST["address"];//����Ϊ�õ�������������
date_default_timezone_set("PRC");//����ʱ��
$time=date("Y-m-d");//�õ�����
$act=$_GET["act"];//�õ������Ķ���ֵ
//��Ӳ���
if($act=='add')//��������Ӷ���
{
    $num=exist_member($username);//���ú����������Ǽ���Ա���Ƿ��Ѿ�ע��
     if($num==0)//����δע��
     {
       $sql="insert into hy(username,password,name,sex,telephone,email,create_date) values('$username','$password','$name','$sex','$tel','$email','$time')";//�����Ա��SQL���
       $query=mysql_query($sql);//ִ�в�ѯ
       echo "<script>alert('The Success Of The Registration, Please Login��'); window.location.href='index.php';</script>"; //����ע��ɹ���ʾ
    }
    else
    {
     echo "<script>alert('The Account Already Exists, Please Input Again��'); window.location.href='reg.php';</script>"; //����Ѿ�ע�ᣬ�����Ѿ�ע����ú�����ʾ
    }
}
//�޸Ĳ���
if($act=='edit')//�������޸Ķ���
{
  $id=$_POST["id"];//�õ�������IDֵ
  $sql="update hy set name='$name',sex='$sex',telephone='$tel',email='$email' where user_id='$id'";//���»�Ա���ϵ�SQL���
  $query=mysql_query($sql);//ִ�и��¶���
  echo "<script>alert('Successful Modification��'); window.location.href='edit_info.php';</script>";//�������³ɹ�����ʾ
}



?>