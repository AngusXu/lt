<?
include("../inc/conn.php");//包含链接数据库文件
include("../inc/func.php");//包含功能函数文件
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
<link rel="stylesheet" type="text/css" href="Admin_Style.css">
</head>

<body onLoad="javascipt:setTimeout('loadForm()',2000);">

  <table border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr class="title">
      <td height="22" align="center">&nbsp;</td>
    </tr>
    <tr align="center">
      <td>
	  <?
  $id=$_GET["id"];//得到传来的ID值
  $sql="select * from bk where bk_id='$id'";//根据ID值在版块表里查询
  $query=mysql_query($sql);//建立一个查询
  $rs=mysql_fetch_assoc($query);//建立一个对应的数据库集合
  ?>
	<table width="100%" border="0" cellpadding="2" cellspacing="1">
	<form action="save_bk.php?act=edit" method="post" name="form10">
	<input type="hidden" name="id" value="<?=$id?>">
          <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>Section：</strong></td>
            <td width="595"><input name="bk" type="text" id="bk" size="50" maxlength="255" value="<?=$rs["bk"]?>"> 
              <font color="#FF0000">*</font></td>
          </tr>
          <tr class="tdbg">
            <td height="67" align="right" valign="middle"><strong>Introduction：</strong></td>
            <td><textarea name="bk_ms" cols="60" rows="6" id="bk_ms"><?=$rs["bk_ms"]?></textarea></td>
          </tr>
          <tr class="tdbg">
            <td height="24" align="right" valign="middle">Picture：</td>
            <td><input name="pic" type="text" id="pic" size="50" maxlength="255" value="<?=$rs["pic"]?>"></td>
          </tr>
          <tr class="tdbg">
            <td height="24" align="right" valign="middle"></td>
            <td align="left"><iframe border="0" frameBorder="0" frameSpacing="0" height="21" marginHeight="0" marginWidth="0" noResize scrolling="no" width="100%" vspale="0" src="up.php"></iframe></td>
          </tr>
          <tr class="tdbg"> 
            <td width="100" height="24" align="right" valign="middle"></td>
            <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
          </tr>
		  </form>
        </table>
      </td>
    </tr>
  </table>
  

</body>
</html>
