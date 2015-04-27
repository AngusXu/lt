
<html>
<head>
<title></title>
<style type=text/css>
body  { background:#39867B; margin:0px; font:9pt ; }
table  { border:0px; }
td  { font:normal 12px ; }
img  { vertical-align:bottom; border:0px; }
a  { font:normal 12px ; color:#000000; text-decoration:none; }
a:hover  { color:#cc0000;text-decoration:underline; }
.sec_menu  { border-left:1px solid white; border-right:1px solid white; border-bottom:1px solid white; overflow:hidden; background:#C6EBDE; }
.menu_title  { }
.menu_title span  { position:relative; top:2px; left:8px; color:#39867B; font-weight:bold; }
.menu_title2  { }
.menu_title2 span  { position:relative; top:2px; left:8px; color:#cc0000; font-weight:bold; }
</style>
<SCRIPT language=javascript1.2>
function showsubmenu(sid)
{
whichEl = eval("submenu" + sid);
if (whichEl.style.display == "none")
{
eval("submenu" + sid + ".style.display=\"\";");
}
else
{
eval("submenu" + sid + ".style.display=\"none\";");
}
}
</SCRIPT>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312"></head>
<BODY leftmargin="0" topmargin="0" marginheight="0" marginwidth="0">
<table width=100% cellpadding=0 cellspacing=0 border=0 align=left>
    <tr><td valign=top><table width=158 border="0" align=center cellpadding=0 cellspacing=0>
      <tr>
        <td height=42 valign=bottom> </td>
      </tr>
    </table>
      <table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
        <td height=25 background=images/title_bg_quit.gif class=menu_title id=menuTitle0 onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title';> 
          <span><a href="#"><b>Home Management</b></a> | 
			<a href=exit.php target=_top><b>Exit</b></a></span>        </td>
  </tr>
  <tr>
    <td style="display:" id='submenu0'>
<div class=sec_menu style="width:158">
<table cellpadding=0 cellspacing=0 align=center width=150>
<tr><td height=20> Welcome ！</td></tr>
</table>
</div>
<div  style="width:158">
<table cellpadding=0 cellspacing=0 align=center width=130>
<tr><td height=20></td></tr>
</table>
</div>
	</td>
  </tr>
</table>

<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
        <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/Admin_left_1.gif" id=menuTitle1 onClick="showsubmenu(1)" style="cursor:hand;"> 
          <span>Forum Management</span> </td>
  </tr>
  <tr>
    <td style="display:block" id='submenu1'>
<div class=sec_menu style="width:158">
<table cellpadding=0 cellspacing=0 align=center width=130>
<tr><td height=20><a href="add_bk.php" target=main>Add Sections</a></td></tr>
<tr><td height=20><a href="manage_bk.php" target=main>Management Section</a></td></tr>

</table>
</div>
<div  style="width:158">
<table cellpadding=0 cellspacing=0 align=center width=130>
<tr><td height=20></td></tr>
</table>
</div>
	</td>
  </tr>
</table>

<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
        <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/Admin_left_9.gif" id=menuTitle2 onClick="showsubmenu(2)" style="cursor:hand;"> 
          <span>Member Management</span> </td>
  </tr>
  <tr>
    <td style="display:block" id='submenu2'>
<div class=sec_menu style="width:158">
<table cellpadding=0 cellspacing=0 align=center width=130>
<tr>
  <td height=20><a href="hylist.php" target="main">Member Management</a></td>
</tr>


</table>
</div>
<div  style="width:158">
<table cellpadding=0 cellspacing=0 align=center width=130>
<tr><td height=20></td></tr>
</table>
</div>
	</td>
  </tr>
</table>

<table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/Admin_left_9.gif" id=menuTitle2 onClick="showsubmenu(3)" style="cursor:hand;"><span>Management Posts</span> </td>
  </tr>
  <tr>
    <td style="display:block" id='submenu3'><div class=sec_menu style="width:158">
      <table cellpadding=0 cellspacing=0 align=center width=130>
        <tr>
  <td height=20><a href="bbslist.php" target="main">Management Posts</a></td>
</tr>

        
      </table>
    </div>
        <div  style="width:158">
          <table cellpadding=0 cellspacing=0 align=center width=130>
            <tr>
              <td height=20></td>
            </tr>
          </table>
        </div></td>
  </tr>
</table>

    <table cellpadding=0 cellspacing=0 width=158 align=center>
  <tr>
    <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/Admin_left_9.gif" id=menuTitle2 onClick="showsubmenu(4)" style="cursor:hand;"><span>Notice Management</span> </td>
  </tr>
  <tr>
    <td style="display:block" id='submenu4'><div class=sec_menu style="width:158">
      <table cellpadding=0 cellspacing=0 align=center width=130>
	   <tr>
  <td height=20><a href="add_arc.php" target="main">Add Notice</a></td>
</tr>
   <tr>
  <td height=20><a href="arclist.php" target="main">Notice Management</a></td>
</tr>

        
      </table>
    </div>
        <div  style="width:158">
          <table cellpadding=0 cellspacing=0 align=center width=130>
            <tr>
              <td height=20></td>
            </tr>
          </table>
        </div></td>
  </tr>
</table>
    <table cellpadding=0 cellspacing=0 width=158 align=center>
      <tr>
        <td height=25 class=menu_title onmouseover=this.className='menu_title2'; onmouseout=this.className='menu_title'; background="images/Admin_left_9.gif" id=menuTitle8>&nbsp;</td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table>
    </div></td>
    </tr>
</table>




</td></tr>
</table>
</body>
</html>
