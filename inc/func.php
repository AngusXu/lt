<?
//公用函数，截取字符串,汉字专用
function chgtitle($title,$length){  
$encoding='gb2312'; 
if(mb_strlen($title,$encoding)>$length){ 
$title=mb_substr($title,0,$length,$encoding); 
} 
return $title; 
} 


//验证会员帐号是否存在
function exist_member($userid)
{
  $query=mysql_query("select * from hy where username='$userid'");
  $num=mysql_num_rows($query);
   mysql_free_result($query);
   return $num;
}
//根据积分得到会员等级
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


//关闭查询
function closequery($query)
{
  mysql_free_result($query);
}
?>
