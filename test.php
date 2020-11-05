<?php
//$id=array(25,26,27,28,29,30,31,1,2,3,4,5,6,7,8);
//for($iy=2013;$iy<2067;++$iy){foreach($id as $k=>$v){if($k<7){$im=12;}else{$im=1;}
//    if($k==7){++$iy;echo '====<br>';}$tme=strtotime("$im/$v/$iy");
//    echo date('d-m-Y',$tme),'  * *  ';
////THE ACTUAL CODE =================
//    $w=(int)date('W',$tme);
//    $m=(int)date('n',$tme);
//    $w=$w==1?($m==12?53:1):($w>=51?($m==1?0:$w):$w);
////THE ACTUAL CODE =================
//    echo '<b>WEEK: ',$w,' --- ','YEAR: ',date('Y',$tme),'</b><br>';}--$iy;
//    echo '----------------------------------<br>';}
$date = new DateTime(2015-01-01);
$year = $date->format("Y");
$week = $date->format("W");

var_dump($date);
