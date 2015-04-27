<?
include("../inc/checkadmin.php");//包含验证管理员登录文件
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
<?
  
    $id=$_GET["id"];//得到传来的ID值
	$query=mysql_query("select * from arc where arc_id='$id'");//根据ID值在信息表里进行查询的SQL语句
	$rs=mysql_fetch_assoc($query);//建立一个数据集合

  ?>
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr class="title">
      <td height="22" align="center"><b>Add</b></td>
    </tr>
    <tr align="center">
      <td>
	<table width="100%" border="0" cellpadding="2" cellspacing="1">
	<form action="save_arc.php?act=edit" method="post" name="form10">
	<input type="hidden" name="id" value="<?=$id?>">
	<input type="hidden" name="url" value="<?=$_SERVER["HTTP_REFERER"]//得到上一页的地址，并设置在隐藏域中?>">
          <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>Title：</strong></td>
            <td width="595"><input name="title" type="text" id="title" size="50" value="<?=$rs["title"]?>">
            <font color="#FF0000">*</font></td>
          </tr>
          <tr class="tdbg">
            <td height="67" align="right" valign="middle"><strong>Content：</strong></td>
            <td>
     <textarea name="content" style="width:650px;height:400px;"><?=$rs['content']?></textarea>
                      
                    </td>
          </tr>
          <tr class="tdbg">
            <td height="24" align="right" valign="middle">Picture：</td>
            <td><INPUT name="pic" type="text" id="pic" maxlength=35 readonly="true" value="<?=$rs["pic"]?>"></td>
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
