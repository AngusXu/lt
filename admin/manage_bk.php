<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<link rel="stylesheet" type="text/css" href="Admin_Style.css">

</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg"> 
    <td height="22" colspan="2"  align="center"><strong>The Back Stage Management</strong></td>
  </tr>
  <tr class="tdbg"> 
    <td width="70" height="30" >&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="title"> 
    <td height="22">Forum Management</td>
  </tr>
</table>
<br><br>
<table width='80%' border="0" cellpadding="0" cellspacing="0" align=center><tr>
   
     <td><table class="border" border="0" cellspacing="1" width="100%" cellpadding="0">
          <tr class="title" height="22"> 
            <td height="22" width="44" align="center">&nbsp;</td>
            <td width="56" align="center"  height="22"><strong>ID</strong></td>
            <td align="center"  width=691><strong>Section</strong></td>
            <td width="268" align="center" ><strong>Operation</strong></td>
          </tr>
          <?
		  $sql="select * from bk order by bk_id desc";//构造一个查询版块的SQL语句
		  $query=mysql_query($sql);//执行查询
		  while($rs=mysql_fetch_array($query))//建立一个循环的数据集合
		  {
		  ?>
          <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'"> 
            <td width="44" height="24" align="center">&nbsp;</td>
            <td width="56" align="center"><?=$rs["bk_id"]?></td>
            <td><?=$rs["bk"]?></td>
            <td width="268" align="center"><a href="save_bk.php?act=del&id=<?=$rs["bk_id"]?>">Delete</a>  <a href="edit_bk.php?id=<?=$rs["bk_id"]?>">Edit</a></td>
          </tr>
         <?
		 }
		 ?>
		 
        </table>

</td>
</tr></table>
</body>
</html>
