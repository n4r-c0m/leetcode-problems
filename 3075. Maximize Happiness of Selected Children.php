<?php

class Solution {

    /**
     * @param Integer[] $happiness
     * @param Integer $k
     * @return Integer
     */
    function maximumHappinessSum($happiness, $k) {
        sort($happiness);

        $result = 0;
        for ($i = 0; $i < $k; $i++) {
            $result += max(
                0,
                array_pop($happiness) - $i,
            );
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->maximumHappinessSum([2,3,4,5], 1)); // 5
var_dump($solution->maximumHappinessSum([1,2,3], 2)); // 4
var_dump($solution->maximumHappinessSum([1,1,1,1], 2)); // 1
