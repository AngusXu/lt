<table width="960" height="119" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="119" align="right" background="images/banner.jpg"><table width="82%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="57%" height="91">&nbsp;</td>
        <td width="43%">
		<?
if(empty($_SESSION["username"]))//判断是否登录
 {
?>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
		<form action="checklogin.php" method="post">
          <tr>
            <td width="22%" height="30" align="center" class="black">Account：</td>
            <td width="45%" align="left"><input name="username" type="text" class="table1" id="username" size="18" /></td>
            <td width="17%" class="black">&nbsp;</td>
            <td width="16%">&nbsp;</td>
          </tr>
          <tr>
            <td height="30" align="center" class="black">Password：</td>
            <td><input name="password" type="password" class="table1" id="password" size="18" /></td>
            <td align="center"><input type="submit" name="Submit" value="Login" /></td>
            <td align="center"><a href="reg.php" class="text12">Register</a></td>
          </tr>
		  </form>
        </table>
<?
 }
	else
 {
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
		
          <tr>
            <td height="23" align="center" class="black">Welcome，<?=$_SESSION["username"];?>,Your Score：
			<?
			$jcx=mysql_query("select * from hy where username='".$_SESSION["username"]."'");//建立一个查询对应账号的查询
			$r=mysql_fetch_assoc($jcx);//建立数据集合
			echo $r["jf"];//打印积分
			mysql_free_result($jcx);//释放资源
			?>
			Your Grade：<?=turndj($_SESSION["username"])?></td>
            </tr>
          <tr>
            <td height="30" align="center" class="black"><a href="edit_pwd.php" class="black">Change Password</a> <a href="edit_info.php" class="black">Modify The Data</a> <a href="exit.php" class="text12">Login Out</a></td>
            </tr>
		  
        </table>
<?
}
?>
		</td>
      </tr>
    </table></td>
  </tr>
</table>
<table width="960" height="40" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="91" align="center" valign="middle" background="images/DH_01.jpg"><a href="index.php" class="bai12">Home Page</a></td>
    <td width="788" background="images/DH_03.jpg"><table width="700" height="40" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="120" align="center" valign="middle" background="images/DH_02.jpg"><a href="phb.php" class="bai12">Ranking List</a></td>
        <td width="103" align="center" valign="middle" background="images/DH_02.jpg"><a href="jfb.php" class="bai12">Points Ranking</a></td>
        <td width="38" align="center" valign="middle" background="images/DH_02.jpg">&nbsp;</td>
        <td width="87" align="center" valign="middle" background="images/DH_02.jpg">&nbsp;</td>
        <td width="87" align="center" valign="middle" background="images/DH_02.jpg">&nbsp;</td>
        <td width="87" align="center" valign="middle" background="images/DH_02.jpg">&nbsp;</td>
        <td width="87" align="center" valign="middle" background="images/DH_02.jpg">&nbsp;</td>
        <td width="91">&nbsp;</td>
      </tr>
    </table></td>
    <td width="81" background="images/DH_04.jpg">&nbsp;</td>
  </tr>
</table>
<table width="100" height="5" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="960" height="42" border="0" align="center" cellpadding="0" cellspacing="0" background="images/top_bj.jpg">
  <tr>
    <td width="88" height="42" align="right" class="text12">Search：</td>
    <td width="872" align="left" valign="middle"><table width="768" height="37" border="0" cellpadding="0" cellspacing="0">
	<form action="search.php">
      <tr>
        <td width="235" height="37" align="center" valign="middle"><input name="key" type="text" class="iborder" id="key" value="" size="30" /></td>
        <td width="83" align="center" valign="middle"><input name="Submit2" type="submit" class="black" value="search" /></td>
        <td width="450" align="left" class="red">&nbsp;</td>
      </tr>
	  </form>
    </table></td>
  </tr>
</table>
