<?php
function findMin($array){
    $index = NULL;
    $min= $array[0];
    for($i=0;$i<count($array);$i++);{
        if($array[$i]<$min){
            $array[$i]=$min;
        }
    }
    return $i;
}