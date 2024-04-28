<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function minFallingPathSum($grid) {
        $n = count($grid);

        for ($y = 1; $y < $n; $y++) {
            $mins = $this->findTwoSmallest($grid[$y - 1]);
            for ($x = 0; $x < $n; $x++) {
                if ($grid[$y - 1][$x] === $mins[0]) {
                    $grid[$y][$x] += $mins[1];
                } else {
                    $grid[$y][$x] += $mins[0];
                }
            }
        }

        return min($grid[$n - 1]);
    }

    function findTwoSmallest($array) {
        $min1 = PHP_INT_MAX;
        $min2 = PHP_INT_MAX;

        foreach ($array as $x) {
            if ($x < $min1) {
                $temp = $min1;
                $min1 = $x;
                $min2 = $temp;
            } else if ($x < $min2) {
                $min2 = $x;
            }
        }

        return [$min1, $min2];
    }
}

$solution = new Solution();
var_dump($solution->minFallingPathSum([[-2,-18,31,-10,-71,82,47,56,-14,42],[-95,3,65,-7,64,75,-51,97,-66,-28],[36,3,-62,38,15,51,-58,-90,-23,-63],[58,-26,-42,-66,21,99,-94,-95,-90,89],[83,-66,-42,-45,43,85,51,-86,65,-39],[56,9,9,95,-56,-77,-2,20,78,17],[78,-13,-55,55,-7,43,-98,-89,38,90],[32,44,-47,81,-1,-55,-5,16,-81,17],[-87,82,2,86,-88,-58,-91,-79,44,-9],[-96,-14,-52,-8,12,38,84,77,-51,52]]));
var_dump($solution->minFallingPathSum([[-73,61,43,-48,-36],[3,30,27,57,10],[96,-76,84,59,-15],[5,-49,76,31,-7],[97,91,61,-46,67]])); //-192
var_dump($solution->minFallingPathSum([[1,2,3],[4,5,6],[7,8,9]])); //13
var_dump($solution->minFallingPathSum([[7]])); //7
