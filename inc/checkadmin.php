<?
session_start();//����session�Ի�
if(empty($_SESSION["adminname"]))//�������Աδ��¼
{
echo "<script>alert('Please login��');window.top.location.href='login.php'</script>";//������ʾ
}
?> 
