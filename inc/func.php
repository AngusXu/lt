<?
//���ú�������ȡ�ַ���,����ר��
function chgtitle($title,$length){  
$encoding='gb2312'; 
if(mb_strlen($title,$encoding)>$length){ 
$title=mb_substr($title,0,$length,$encoding); 
} 
return $title; 
} 


//��֤��Ա�ʺ��Ƿ����
function exist_member($userid)
{
  $query=mysql_query("select * from hy where username='$userid'");
  $num=mysql_num_rows($query);
   mysql_free_result($query);
   return $num;
}
//���ݻ��ֵõ���Ա�ȼ�
function turndj($username)
{
  $qq=mysql_query("select * from hy where username='$username'");
  $rr=mysql_fetch_assoc($qq);
  $jf=$rr["jf"];
  mysql_free_result($qq);
   $s="";
   if ($jf<=10)
   {
      $s="Captain";
   }
   if ($jf>=10&&$jf<=35)
   {
      $s="Colonel";
   }
   if ($jf>=35&&$jf<=50)
   {
      $s="General";
   }
   return $s;
}


//�رղ�ѯ
function closequery($query)
{
  mysql_free_result($query);
}
?>
