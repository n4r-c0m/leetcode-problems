<?php

class Solution {

    /**
     * @param Integer[] $ratings
     * @return Integer
     */
    function candy($ratings) {
        $count = count($ratings);
        $candies = array_fill(0, $count, 1);

        for ($i = 1; $i <= $count - 1; $i++) {
            if ($ratings[$i] > $ratings[$i - 1]) {
                $candies[$i] = $candies[$i - 1] + 1;
            }
        }

        for ($i = $count - 2; $i >= 0; $i--) {
            if ($ratings[$i] > $ratings[$i + 1]) {
                $candies[$i] = max($candies[$i], $candies[$i + 1] + 1);
            }
        }

        return array_sum($candies);
    }
}

$solution = new Solution();
//var_dump($solution->candy([1, 0, 2])); // 5
//var_dump($solution->candy([1, 2, 2])); // 4
//var_dump($solution->candy([1, 2, 3, 4, 5, 6, 7, 8, 9])); // 45
//var_dump($solution->candy([9, 8, 7, 6, 5, 4, 3, 2, 1])); // 45
//var_dump($solution->candy([1, 3, 2, 2, 1])); // 7
var_dump($solution->candy([1, 3, 4, 5, 2])); // 11
