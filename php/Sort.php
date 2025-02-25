<?php

namespace php;
require 'vendor/autoload.php';

class Sort
{
    // 选择排序
    public function selectSorting(&$array)
    {
        // 循环
        $maxNum = count($array);
        for ($i = 0; $i < $maxNum; $i++) {
            // 指针, 默认指针放到当前循环的位置
            $pointer = $i;
            // 一次最外层循环找到一个数，所以从第i次找，前面已经找好的跳过即可
            for ($j = $i; $j < $maxNum; $j++) {
                // 这个大于是倒序小于是正序调整排序的
                // 遇到比自己小的数，把指针放过去
                if($array[$pointer] > $array[$j]){
                    $pointer = $j;
                    dump('更换指针指向位置------------'.$pointer);
                }

                // 循环到最后一个，根据指针，调换位置；
                if ($j == ($maxNum-1)){
                    dump('最后一次循环交换位置：'.$j.'------------------'.$pointer);
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
$arr = [9,1,88,8,2];
$select = $sort->selectSorting($arr);
print_r($select);
