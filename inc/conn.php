<?
ini_set("error_reporting","E_ALL & ~E_NOTICE"); 
$conn=mysql_connect ("localhost", "root", "root");//127.0.0.1是MySql IP,root是帐号,如果有密码请填写在""中
mysql_select_db("lt"); //guestbook是数据库名
//$conn=mysql_connect ("127.0.0.1", "root", "123456");//127.0.0.1是MySql IP,root是帐号,如果有密码请填写在""中
//mysql_select_db("db_peek"); //guestbook是数据库名
mysql_query("set names gb2312");
function txtClean($valueString){
            $txt=array("\n","\r");
            $html=array(" "," ");
            return str_replace($txt,$html,$valueString);
        }
?> 
