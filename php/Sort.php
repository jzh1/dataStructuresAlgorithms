<?php

namespace php;
require 'vendor/autoload.php';

class Sort
{
    /**
     * 选择排序
     * @param $array
     * @return mixed
     */
    public function selectSorting($array): mixed
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

    /** 冒泡排序
     * @param $array
     * @return mixed
     */
    public function bubbling($array): mixed
    {
        $maxNum = count($array);
        for ($i = $maxNum-1; $i > 0; $i--) {
            for ($j = 0; $j < $i; $j++) {
                if($array[$j] < $array[$j+1]){
                    $temp = $array[$j];
                    $array[$j] = $array[$j+1];
                    $array[$j+1] = $temp;
                }
            }
            dump($array);
        }

        return $array;
    }

    /**
     * 插入排序
     */
    public function insert($array)
    {
        dump($array);
        // 最大数量
        $maxNum = count($array);
        for ($i = 1; $i < $maxNum; $i++) {
            for ($j = $i; $j > 0; $j--) {
                if($array[$j] > $array[$j-1]){
                    $temp = $array[$j];
                    $array[$j] = $array[$j-1];
                    $array[$j-1] = $temp;
                }
            }
            dump($array);
        }

        return $array;
    }


    /**
     * 希尔排序
     */
    public function shellInsert(array $array): mixed
    {
        // 最大数量
        $maxNum = count($array);

        // 计算希尔间隔
        $h = 1;
        while ($h <= $maxNum / 3) {
            $h = $h * 3 + 1;
        }

        for ($gap = $h; $gap >= 1; ($gap = ($gap - 1) / 3)) {
            for ($i = $gap; $i < $maxNum; $i++) {
                for ($j = $i; $j > $gap - 1; $j -= $gap) {
                    if ($array[$j] > $array[$j - $gap]) {
                        $temp             = $array[$j];
                        $array[$j]        = $array[$j - $gap];
                        $array[$j - $gap] = $temp;
                    }
                }
                dump('希尔gap:'.$gap,$array);
            }
            dump($gap);
        }

        return $array;
    }


}

$sort = new Sort();
$arr = [9,1,88,8,2,2,33,8778,87,1,23];
//$arr = [9,1,88,8];
$select = $sort->shellInsert($arr);
print_r($select);
