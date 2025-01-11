<?php
    $arr1 = array(100,200,300);
    $arr2 = array(400,500,600);
    $arr3 = array(700,800,900);
    $arr = array($arr1,$arr2,$arr3);
    print $arr[2][1]."\n\n";
    $sum = 0;
    foreach($arr[0] as $ar){
        $sum+=$ar;
    }
    $avg = $sum/3;
    print "Avg marks of class one is ".$avg."\n";

?>