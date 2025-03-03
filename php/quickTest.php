<?php
require 'vendor/autoload.php';

class QuickTest
{

    function sort1()
    {
        $array = [1,5,8,4,32,9,3,7,6];
        dump($array);
        $left = 0;
        $right = count($array)-1;
        $this->sort2($array,$left,$right);

        dump($array);
    }

    function sort2(&$array,$leftPoint,$rightPoint)
    {
        if ($leftPoint > $rightPoint) return;

        $mid = $this->sortHandle($array,$leftPoint,$rightPoint);
        $this->sort2($array,$leftPoint,$mid-1);
        $this->sort2($array,$mid+1,$rightPoint);

    }

    function sortHandle (&$array,$leftPoint, $rightPoint)
    {
        $left = $leftPoint;
        $right = $rightPoint-1;
        $basePointValue = $array[$rightPoint];

        while ($left <= $right) {
            while($left <= $right && $array[$left] <= $basePointValue ) $left++;
            while ($left <= $right && $array[$right] > $basePointValue) $right--;
            if ($left < $right) {
                $this->swapTemp($array,$left,$right);
            }
        }

        $this->swapTemp($array,$left,$rightPoint);

        return $left;
    }

    function swapTemp(&$array,$i,$j){
        $arrayTemp = $array[$i];
        $array[$i] = $array[$j];
        $array[$j] = $arrayTemp  ;
    }

}

(new  QuickTest())->sort1();