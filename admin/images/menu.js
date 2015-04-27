 var h;
 var w;
 var l;
 var t;
 var topMar = 3;
 var leftMar = -10;
 var space = 2;
 var isvisible;
 var MENU_SHADOW_COLOR='#ffffff';
 var global = window.document
 global.fo_currentMenu = null
 global.fo_shadows = new Array

function HideMenu() 
{
 var mX;
 var mY;
 var vDiv;
 var mDiv;
	if (isvisible == true)
{
		vDiv = document.all("menuDiv");
		mX = window.event.clientX + document.body.scrollLeft;
		mY = window.event.clientY + document.body.scrollTop;
		if ((mX < parseInt(vDiv.style.left)) || (mX > parseInt(vDiv.style.left)+vDiv.offsetWidth) || (mY < parseInt(vDiv.style.top)-h) || (mY > parseInt(vDiv.style.top)+vDiv.offsetHeight)){
			vDiv.style.visibility = "hidden";
			isvisible = false;
		}
}
}

function ShowMenu(vMnuCode,tWidth) {
	vSrc = window.event.srcElement;
	vMnuCode = "<table id='submenu' cellspacing=1 cellpadding=3 style='width:"+tWidth+"' class=tableborder1 onmouseout='HideMenu()'><tr height=23><td nowrap align=left class=tablebody1>" + vMnuCode + "</td></tr></table>";

	h = vSrc.offsetHeight;
	w = vSrc.offsetWidth;
	l = vSrc.offsetLeft + leftMar+4;
	t = vSrc.offsetTop + topMar + h + space-2;
	vParent = vSrc.offsetParent;
	while (vParent.tagName.toUpperCase() != "BODY")
	{
		l += vParent.offsetLeft;
		t += vParent.offsetTop;
		vParent = vParent.offsetParent;
	}

	menuDiv.innerHTML = vMnuCode;
	menuDiv.style.top = t;
	menuDiv.style.left = l;
	menuDiv.style.visibility = "visible";
	isvisible = true;
    makeRectangularDropShadow(submenu, MENU_SHADOW_COLOR, 4)
}

function makeRectangularDropShadow(el, color, size)
{
	var i;
	for (i=size; i>0; i--)
	{
		var rect = document.createElement('div');
		var rs = rect.style
		rs.position = 'absolute';
		rs.left = (el.style.posLeft + i) + 'px';
		rs.top = (el.style.posTop + i) + 'px';
		rs.width = el.offsetWidth + 'px';
		rs.height = el.offsetHeight + 'px';
		rs.zIndex = el.style.zIndex - i;
		rs.backgroundColor = color;
		var opacity = 1 - i / (i + 1);
		rs.filter = 'alpha(opacity=' + (100 * opacity) + ')';
		el.insertAdjacentElement('afterEnd', rect);
		global.fo_shadows[global.fo_shadows.length] = rect;
	}
}
var news= '&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"news.asp?classname=公司新闻\"><font color="#000000">公司新闻</font></a><br>&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"news.asp?classname=行业新闻\"><font color="#000000">行业新闻</font>'
var about= '&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"zhichi.asp\"><font color="#000000">维修资料</font></a><br>&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"about2.asp\"><font color="#000000">维修经验</font>'
var Product= '&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"Product.asp?Classid=1\"><font color="#000000">进口设备</font></a><br>&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"Product.asp?Classid=2\"><font color="#000000">国产设备</font></a><br>&nbsp;<a style=font-size:9pt;line-height:14pt; href=\"Product.asp?Classid=3\"><font color="#000000">其他设备</font></a>'
