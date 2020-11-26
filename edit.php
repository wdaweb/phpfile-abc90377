<h1 class="header">檔案編輯</h1>
<?php
include_once('base.php');

if(!empty($_GET['id'])){
 $row=find('upload',$_GET['id']);
}

if(!empty($_POST['id'])){
    $row=find('upload',$_POST['id']);
    if(!empty($_FILES['img']['tmp_name'])){
        $row['name']=$_FILES['img']['name'];
        $subname='';
$subname=explode('.',$_FILES['img']['name']);
$subname=date('Ymdhis').'.'.array_pop($subname);
unlink($row['path']);//要再把路徑改成新檔案前移除舊路徑的檔案
$row['path']="./img/".$subname;
move_uploaded_file($_FILES['img']['tmp_name'],$row['path']);
    }
    $row['type']=$_POST['type'];
    $row['note']=$_POST['note'];

    update('upload',$row);
    header('location:manage.php');
}


?>

<form action="?" method="POST" enctype="multipart/form-data">

<div>上傳檔案<input type="file" name="img"></div>
<div><img src="<?=$row['path']?>" style="width: 100px;"></div>
<div>說明<input type="text" name="note" value="<?=$row['note']?>"></div>
<div>類型<select name="type" id="">
    <option value="圖檔" <?= ($row['type']=='圖檔')?'selected':''?>>圖檔</option>
    <option value="文件" <?= ($row['type']=='文件')?'selected':''?>>文件</option>
    <option value="其他" <?= ($row['type']=='其他')?'selected':''?>>其他</option>
</select>
<input type="hidden" name="id" value="<?=$row['id']?>">
</div>
<div><input type="submit" value="更新"></div>


</form>