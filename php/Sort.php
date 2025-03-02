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
     * 希尔排序（插入排序进阶版本）
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

    public function quick(array &$array): mixed
    {
        dump('开始------------------',$array);
        // 指针位置
        $leftBound = 0;
        $rightBound = count($array)-1;

        $this->quickSort($array,$leftBound,$rightBound);

        return $array;
    }

    public function quickSort($array,$leftBound, $rightBound): mixed
    {
        dump('quickSort---------------------------',$array);
        $mid = $this->quickSortMain($array,$leftBound, $rightBound);
        $this->quickSort($array,$leftBound,$mid-1);
        $this->quickSort($array,$mid+1,$rightBound);

        return $array;
    }

    /**
     * 交换位置
     * @param array $array
     * @param $i
     * @param $j
     * @return mixed
     */
    public function swap(array $array,$i,$j): mixed
    {
        $temp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $temp;

        return $array;
    }

    /**
     * @param int $left
     * @param int $right
     * @param mixed $array
     * @param int $point
     * @return mixed
     */
    private function quickSortMain(mixed $array, int $leftBound, int $rightBound): mixed
    {
        $left = $leftBound;
        $right = $rightBound-1;
        // 快速排序的效率取决于基准点的选择
        $point =  $rightBound;

        while ($left < $right) {
            while ($array[$left] < $array[$point]) $left++;
            while ($array[$right] > $array[$point]) $right--;
            dump($array, '----', $left, $right);
            $array = $this->swap($array, $left, $right);
            dump('交换一次顺序后：--', $array);

        }
        $array = $this->swap($array, $left, $right);

        return $left;
    }

}

$sort = new Sort();
$arr = [9,1,88,8,32,2,33,8778,87,1,23,100];
//$arr = [9,1,88,8];
$select = $sort->quick($arr);
print_r($select);
