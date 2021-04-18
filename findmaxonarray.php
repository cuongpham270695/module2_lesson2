<?php
$array = [];
for ($i = 0; $i < 10; $i++) {
    array_push($array, [7, 5, 12, 16, 24, 13, 18, 6, 4]);
}
$max = $array[0][0];
$index1 = 0;
$index2 = 0;
for ($i = 0; $i < count($array); $i++) {
    for ($j=0;$j<count($array[$i]);$j++){
        if($array[$i][$j]>$max){
            $max = $array[$i][$j];
            $index1 = $i;
            $index2 = $j;
        }
    }
}
echo "<pre>";
var_dump($array);
echo "<hr>" . $max . "[" . $index1 . "," . $index2 . "]";