<?
session_start();//����session�Ի�
include("inc/conn.php");//�����������ݿ��ļ�
include("inc/func.php");//���ӹ��ܺ����ļ�
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Indoorsman Froum</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-color: #F3FCFB;
}
-->
</style></head>
<SCRIPT language=JavaScript>
function query(locationid)
{
var tx_id=locationid
document.all.tx_img.src="face/"+tx_id+".gif";
}
</SCRIPT>
<body>
<?
include("top.php");//����ͷ���ļ�
$id=$_GET["id"];//��������ID����
$sql="select * from bk where bk_id='$id'";//����SQL����
$query=mysql_query($sql);//������ѯ
$rs=mysql_fetch_assoc($query);//���ݲ�ѯ����һ�����ݼ���
$bk=$rs["bk"];//�õ����ֵ
mysql_free_result($query);//�ͷ���Դ
?>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="960" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="table1">
  <tr>
    <td height="33" background="images/lanmu_bj.jpg">&nbsp;&nbsp;<span class="blue14">[<?=$bk?>] <a href="ft.php?id=<?=$id?>" class="text12">I Want To Post</a> </span></td>
  </tr>
  
  <tr>
    <td height="85" align="center" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="108" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		<form action="save_bbs.php?act=add" method="post" name="form10">
		<input type="hidden" name="url" value="<?=$_SERVER['HTTP_REFERER']?>">
          <tr>
            <td width="12%" height="30" align="center" class="text12">Title��</td>
            <td colspan="2" align="left"><input name="title" type="text" id="title" size="50"></td>
          </tr>
          <tr>
            <td height="29" align="center" class="text12">Section��</td>
            <td height="29" colspan="2" align="left"><select name="bk">
			<?
			$sql="select * from bk";//�����ѯ����SQL���
			$cx=mysql_query($sql);//������ѯ
			while($rst=mysql_fetch_array($cx))//����һ��ѭ�������ݼ���
			{
			?>
              <option value="<?=$rst["bk_id"]?>" <? if($rst["bk_id"]==$id) echo "selected"?>><?=$rst["bk"]?></option>
			 <?
			 }
			 mysql_free_result($cx);//�ͷ���Դ
			 ?> 
            </select>            </td>
          </tr>
          <tr>
            <td height="40" align="center" class="text12">Choose Your Avatar</td>
            <td width="8%" height="40" align="left">
			<select name="tx" onChange="query(document.form10.tx.options[document.form10.tx.selectedIndex].value)">
			<?
			for($i=1;$i<=30;$i++)//ѭ���ۼ�������Ϊ��ѡȡ����
			 {
			?>
			<option value="<?=$i?>">The<?=$i?>Face</option>
			<?
			  }
			?>
			</select>			</td>
            <td width="80%" align="left">&nbsp;<img src="face/1.gif" name="tx_img" width="19" height="19" id=tx_img></td>
          </tr>
          <tr>
            <td height="29" align="center" class="text12">Hair Post Person ID��</td>
            <td height="29" colspan="2" align="left"><input name="username" type="text" id="userid" size="20" value="<?=$_SESSION["username"]?>"></td>
          </tr>
          <tr>
            <td height="29" align="center" class="text12">Content��</td>
            <td height="29" colspan="2" align="left">
			<div align="left">
                      <script type="text/javascript" charset="gb2312" src="kindeditor/kindeditor.js"></script>
                      <script charset="gb2312" src="kindeditor/plugins/code/prettify.js"></script>
                     <script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : 'kindeditor/plugins/code/prettify.css',
				uploadJson : 'kindeditor/php/upload_json.php',
				fileManagerJson : 'kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterBlur : function() {
this.sync();
K.ctrl(document, 13, function() {
K('form[name=form10]')[0].submit();
});
K.ctrl(this.edit.doc, 13, function() {
K('form[name=form10]')[0].submit();
});
}
			});
			prettyPrint();
		});
	</script>
                      <textarea name="content" display="none" style="width:650px;height:400px;"></textarea>			</td>
          </tr>
          <tr>
            <td height="29" align="center">&nbsp;</td>
            <td height="29" colspan="2"><input type="submit" name="Submit" value="Submit"></td>
          </tr>
		  </form>
        </table></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1" align="center" valign="middle" background="images/dot.gif"></td>
  </tr>
 
</table>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<?php
include("copy.php");//������Ȩ�ļ�
?>
</body>
</html>
