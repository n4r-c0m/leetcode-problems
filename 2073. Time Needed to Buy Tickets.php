<?php
class Solution {

    /**
     * @param Integer[] $tickets
     * @param Integer $k
     * @return Integer
     */
    function timeRequiredToBuy($tickets, $k) {
        $result = 0;
        for ($i = $k; $i >= 0; $i--) {
            $result += min($tickets[$i], $tickets[$k]);
        }

        for ($i = count($tickets) - 1; $i > $k; $i--) {
            $result += min($tickets[$i], $tickets[$k] - 1);
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->timeRequiredToBuy([2,3,2], 2)); // 6
var_dump($solution->timeRequiredToBuy([5, 1, 1, 1], 0)); // 8