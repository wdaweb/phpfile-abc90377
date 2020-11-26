
<h1>威力彩號</h1>
<?php
$lotto=[];
while(count($lotto)<6){
    $t=rand(1,49);
    if(!in_array($t,$lotto)){
        array_push($lotto,$t);
    }
}
echo"<pre>";
print_r($lotto);
echo"</pre>";


?>
<h1>威力彩號</h1>
<?php
$lotto=[];
$second=rand(1,8);
while(count($lotto)<6){
    $t=rand(1,38);
    if(!in_array($t,$lotto)){
        array_push($lotto,$t);
    }
}
$lotto[]=$second;

echo"<pre>";
print_r($lotto);
echo"</pre>";

?>
<h1>兌獎</h1>
中獎號碼:
第一組:08,15,21,24,26,30<br>
第二組:07<br>
<?php
$treasure_1=[8,15,21,24,26,30];
$treasure_2=7;
$lotto=[];
$second=rand(1,8);
while(count($lotto)<6){
    $t=rand(1,38);
    if(!in_array($t,$lotto)){
        array_push($lotto,$t);
    }
}
$lotto[]=$second;

echo"<pre>";
print_r($lotto);
echo"</pre>";

$l2=array_pop($lotto);
if($l2===$treasure_2){
    $res_2=1;
}else{
    $res_2=0;
}
$res_1=0;
foreach($treasure_1 as $t){

    foreach($lotto as $l){

        if($t===$l){
            $res_1=$res_1+1;
        }
    }
}


?>
<h1>已知西元1024年為甲子年，提供一個西元年份，輸出天干地支的年別
</h1>
<?php
$sky=['甲','乙','丙','丁','戊','己','庚','辛','壬','癸'];
$land=['子','丑','寅','卯','辰','巳','午','未','申','酉','戌','亥'];
$match=[];
foreach($sky as $i=> $s){

    foreach($land as $j=> $l){
        
        $match[]=$s.$l;
    }

}

print_r($match);
echo $match[1096];

?>
