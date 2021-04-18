<?php
$arr = [25,12,4,9,8,31,15,14,10,6];
function findMin($array){
    $min= $array[0];
    for($i=1;$i<=count($array);$i++);{
        if($array[$i]<$min){
            $min = $array[$i];
        }
    }
    return $min;
}

echo "Giá trị nhỏ nhất trong mảng là: " . findMin($arr);