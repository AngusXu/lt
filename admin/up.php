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
    $path="../upload/";        //�ϴ�·��

//echo $_FILES["filename"]["type"];


if(!file_exists($path))
{
    //����Ƿ��и��ļ��У����û�оʹ��������������Ȩ��
    mkdir("$path", 0700);
}//END IF
//�����ϴ����ļ���ʽ
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
//����ϴ��ļ��Ƿ��������ϴ�������
if(!in_array($_FILES["filename"]["type"],$tp))
{
    echo "<script>";
    echo "alert('Please note that the upload file format��');";
	echo "location.href='up.php';";
    echo "</script>";
    exit;
}//END IF
if($_FILES["filename"]["name"])
{
        $file1=$_FILES["filename"]["name"];
		$exten=pathinfo($_FILES["filename"]["name"]);
		$exten=$exten["extension"];
		//�ȵ��ϴ��ļ�������
        $file2 = $path.time().'.'.$exten;
		
        $flag=1;
}//END IF
if($flag) $result=move_uploaded_file($_FILES["filename"]["tmp_name"],$file2);
//�ر�ע�����ﴫ�ݸ�move_uploaded_file�ĵ�һ������Ϊ�ϴ����������ϵ���ʱ�ļ�
if($result)
{
    $file2=str_replace("../","",$file2);
    //echo "�ϴ��ɹ�!".$file2;
    echo "<script language='javascript'>";
    echo "alert(\"Uploaded Successfully��\");";
    echo "parent.form10.pic.value='$file2'";
	
    echo "</script>";
}//END IF


}

?>
