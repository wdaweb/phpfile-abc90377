<?php
include_once('base.php');
$id=$_GET['id'];

//找出檔案路徑並刪除
$row=find('upload',$id);
$path=$row['path'];
echo $path;
unlink($path);



del('upload',$_GET['id']);
header('location:manage.php');
?>