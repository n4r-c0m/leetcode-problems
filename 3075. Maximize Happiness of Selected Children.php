<?php

class Solution {

    /**
     * @param Integer[] $happiness
     * @param Integer $k
     * @return Integer
     */
    function maximumHappinessSum($happiness, $k) {
        rsort($happiness);
        $happiness = array_slice($happiness, 0, $k);

        for ($i = 0; $i < $k; $i++) {
            $happiness[$i] = max(
                0,
                $happiness[$i] - $i,
            );
        }

        return array_sum($happiness);
    }
}

$solution = new Solution();
var_dump($solution->maximumHappinessSum([2,3,4,5], 1)); // 5
var_dump($solution->maximumHappinessSum([1,2,3], 2)); // 4
var_dump($solution->maximumHappinessSum([1,1,1,1], 2)); // 1
