<?php
/**
 * 1.建立表單
 * 2.建立處理檔案程式
 * 3.搬移檔案
 * 4.顯示檔案列表
 */
include_once('base.php');
date_default_timezone_set("Asia/Taipei");
if(!empty($_FILES['img']['tmp_name'])){
echo "檔案原始名稱".$_FILES['img']['name'];
echo "<br>檔案上傳成功";
echo "原始上傳路徑".$_FILES['img']['tmp_name']."<br>";
$subname='';
$subname=explode('.',$_FILES['img']['name']);
echo $subname=date('Ymdhis').'.'.array_pop($subname);


move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$subname);//從C槽連回當前資料夾下的img資料夾
$row=[
"name"=>$_FILES['img']['name'],
"path"=>"./img/".$subname,
"type"=>$_POST['type'],
"note"=>$_POST['note']
];
print_r($row);
insert('upload',$row);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>檔案上傳</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <h1 class="header">檔案上傳練習</h1>
 <!----建立你的表單及設定編碼----->
<form action="?" method="POST" enctype="multipart/form-data">

<div>上傳檔案<input type="file" name="img"></div>
<div>說明<input type="text" name="note"></div>
<div>類型<select name="type" id="">
    <option value="圖檔">圖檔</option>
    <option value="文件">文件</option>
    <option value="其他">其他</option>
</select>
</div>
<div><input type="submit" value="上傳"></div>


</form>

<!----建立一個連結來查看上傳後的圖檔---->  

<?php
$rows=all('upload');
echo "<table>";
echo "<tr>";

echo "<td>縮圖</td>";
echo "<td>檔名</td>";
echo "<td>類型</td>";
echo "<td>說明</td>";

echo"</tr>";
foreach($rows as $row){
echo "<tr>";
if($row['type']=='圖檔'){
echo "<td><img src='{$row['path']}' style='width:100px'></td>";
}else{
    echo "<td><img src='./img/fileicon.jpg' style='width:100px'></td>";
}

echo "<td>{$row['name']}</td>";
echo "<td>{$row['type']}</td>";
echo "<td>{$row['note']}</td>";

echo"</tr>";

}
echo "</table>";

?>
</body>
</html>