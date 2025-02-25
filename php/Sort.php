<?php

namespace php;
require 'vendor/autoload.php';

class Sort
{
    // 选择排序
    public function selectSorting(array $array)
    {
        // 循环
        $maxNum = count($array);
        for ($i = 0; $i < $maxNum; $i++) {
            // 指针, 默认指针放到当前循环的位置
            $pointer = $i;
            foreach ($array as $key => $value) {
                dump($value);
                // 这个大于小于是调整排序的
                if($array[$pointer] > $value){
                    var_dump($pointer);
                    $pointer = $key;
                }
                // 循环到最后一个，调换位置
                if ($key == ($maxNum-1)){
                    var_dump('------------------',$key);
                    $temp = $array[$i];
                    $array[$i] = $array[$pointer];
                    $array[$pointer] = $temp;
                }
            }
        }

        return $array;
    }

}

$sort = new Sort();
$select = $sort->selectSorting([9,1,88,8,2]);
print_r($select);
