<?php
require 'vendor/autoload.php';
class QuickSort {
    public static function main() {
        $arr = [9,1,88,8,32,2,53,68,87,23,100,40];
        self::sort($arr, 0, count($arr) - 1);

        self::printArray($arr);
    }

    public static function sort(array &$arr, int $leftBound, int $rightBound, $mark = 'left'): void {
        if ($leftBound >= $rightBound) return;

        error_log( "\n", 3, './logfileQuick.log');
        $mid = self::partition($arr, $leftBound, $rightBound,$mark);
        self::sort($arr, $leftBound, $mid - 1);
        self::sort($arr, $mid + 1, $rightBound,'right');
    }

    private static function partition(array &$arr, int $leftBound, int $rightBound, $mark): int {
        $pivot = $arr[$rightBound];
        $left = $leftBound;
        $right = $rightBound - 1;

        $test = self::getArr($arr, $left, $right, $rightBound);
        error_log(implode(' ',$test)." $mark -- partition start \n", 3, './logfileQuick.log');

        while ($left <= $right) {
            while ($left <= $right && $arr[$left] <= $pivot) {
                $left++;
                $test = self::getArr($arr, $left, $right, $rightBound);
                error_log(implode(' ',$test)." $mark -- 左指针位移 \n", 3, './logfileQuick.log');
            }
            while ($left <= $right && $arr[$right] > $pivot) {
                $right--;
                $test = self::getArr($arr, $left, $right, $rightBound);
                error_log(implode(' ',$test)." $mark -- 右指针位移 \n", 3, './logfileQuick.log');
            }

            if ($left < $right) {
                self::swap($arr, $left, $right,$rightBound,$mark);
            }else{
                $test = self::getArr($arr, $left, $right, $rightBound);
                error_log(implode(' ',$test)." $mark -- 程序掠过，没做交换操作 \n", 3, './logfileQuick.log');
            }
        }

        self::swap($arr, $left, $rightBound,$rightBound,$mark);

        $test = self::getArr($arr, $left, $rightBound, $rightBound);
        error_log(implode(' ',$test)." $mark -- 交换后返回 此时partition返回 $left 指针用来下次处理 pivot=> $pivot \n\n", 3, './logfileQuick.log');
        return $left;
    }

    private static function swap(array &$arr, int $i, int $j,$rightBound,$mark): void {

        $test = self::getArr($arr, $i, $j, $rightBound);
        error_log(implode(' ',$test)." $mark -- 交换位置前索引: [$i]=>$arr[$i]  [$j]=>$arr[$j]  基准数： [$rightBound]=> 【 $arr[$rightBound] 】"."\n", 3, './logfileQuick.log');
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;

        $test = self::getArr($arr, $i, $j, $rightBound);
         error_log(implode(' ',$test)." $mark -- 交换位置后索引: [$i]=>$arr[$i]  [$j]=>$arr[$j]  基准数： [$rightBound]=> 【 $arr[$rightBound] 】 "."\n", 3, './logfileQuick.log');
    }

    private static function printArray(array $arr): void {
        foreach ($arr as $value) {
            echo $value . " ";
        }
        echo "\n";
    }

    /**
     * @param array $arr
     * @param int $i
     * @param int $j
     * @return array
     */
    public static function getArr(array $arr, int $i, int $j, $rightBound): array
    {
        $test = $arr;
        $test[$i] = '[' . $test[$i];
        $test[$j] = $test[$j] . ']';
        $test[$rightBound] = '{' . $test[$rightBound] . '}';
        return $test;
    }
}

// 调用 main 方法来运行排序
QuickSort::main();