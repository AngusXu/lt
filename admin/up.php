<?php

if(empty($_GET[submit]))

{

?><style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>?submit=1" method="post">
Select A Picture: <input name="filename" type="file">
<input type="submit" value="Submit">
</form>
<?php 
}else{
    $path="../upload/";        //上传路径

//echo $_FILES["filename"]["type"];


if(!file_exists($path))
{
    //检查是否有该文件夹，如果没有就创建，并给予最高权限
    mkdir("$path", 0700);
}//END IF
//允许上传的文件格式
$tp = array('image/gif','image/pjpeg','image/png',
'application/msword',
'application/vnd.ms-excel',
'application/pdf',
'application/x-shockwave-flash',
'audio/x-ms-wma',
 'audio/mp3',
 'application/vnd.rn-realmedia',
 'application/x-zip-compressed',
 'application/octet-stream'
);
//检查上传文件是否在允许上传的类型
if(!in_array($_FILES["filename"]["type"],$tp))
{
    echo "<script>";
    echo "alert('Please note that the upload file format！');";
	echo "location.href='up.php';";
    echo "</script>";
    exit;
}//END IF
if($_FILES["filename"]["name"])
{
        $file1=$_FILES["filename"]["name"];
		$exten=pathinfo($_FILES["filename"]["name"]);
		$exten=$exten["extension"];
		//等到上传文件的类型
        $file2 = $path.time().'.'.$exten;
		
        $flag=1;
}//END IF
if($flag) $result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);
//特别注意这里传递给move_uploaded_file的第一个参数为上传到服务器上的临时文件
if($result)
{
    $file2=str_replace("../","",$file2);
    //echo "上传成功!".$file2;
    echo "<script language='javascript'>";
    echo "alert(\"Uploaded Successfully！\");";
    echo "parent.form10.pic.value='$file2'";
	
    echo "</script>";
}//END IF


}

?>
