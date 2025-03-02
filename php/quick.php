<?php

class QuickSort {
    // 主方法，程序的入口
    public static function main() {
        $arr = [9,1,88,8,32,2,53,68,87,23,100,40]; // 初始化数组
        self::sort($arr, 0, count($arr) - 1); // 调用排序方法，传入数组和边界

        self::printArray($arr); // 打印排序后的数组
    }

    // 排序方法，递归实现快速排序
    public static function sort(array &$arr, int $leftBound, int $rightBound): void {
        // 如果左边界大于等于右边界，直接返回（递归终止条件）
        if ($leftBound >= $rightBound) return;

        // 对数组进行分区，并获取分区点的索引
        $mid = self::partition($arr, $leftBound, $rightBound);

        // 递归排序分区点的左侧子数组
        self::sort($arr, $leftBound, $mid - 1);
        // 递归排序分区点的右侧子数组
        self::sort($arr, $mid + 1, $rightBound);
    }

    // 分区方法，将数组根据基准值进行分区
    private static function partition(array &$arr, int $leftBound, int $rightBound): int {
        $pivot = $arr[$rightBound]; // 选择最右边的元素作为基准值
        $left = $leftBound; // 初始化左指针
        $right = $rightBound - 1; // 初始化右指针

        // 当左指针小于等于右指针时，进行循环
        while ($left <= $right) {
            // 左指针右移，直到找到大于基准值的元素
            while ($left <= $right && $arr[$left] <= $pivot) $left++;
            // 右指针左移，直到找到小于等于基准值的元素
            while ($left <= $right && $arr[$right] > $pivot) $right--;

            // 如果左指针小于右指针，交换这两个元素
            if ($left < $right) {
                self::swap($arr, $left, $right);
            }
        }

        // 交换基准值和左指针位置的元素
        self::swap($arr, $left, $rightBound);

        // 返回分区点的索引
        return $left;
    }

    // 交换方法，交换数组中的两个元素
    private static function swap(array &$arr, int $i, int $j): void {
        $temp = $arr[$i]; // 临时变量存储第一个元素的值
        $arr[$i] = $arr[$j]; // 将第二个元素的值赋给第一个元素
        $arr[$j] = $temp; // 将临时变量的值赋给第二个元素
    }

    // 打印数组方法，输出数组的所有元素
    private static function printArray(array $arr): void {
        foreach ($arr as $value) {
            echo $value . " "; // 输出每个元素，并在元素之间添加空格
        }
        echo "\n"; // 输出换行符
    }
}

// 调用 main 方法来运行排序
QuickSort::main();