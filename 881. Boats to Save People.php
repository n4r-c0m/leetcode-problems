<?php

class Solution {

    /**
     * @param Integer[] $people
     * @param Integer $limit
     * @return Integer
     */
    function numRescueBoats($people, $limit) {
        sort($people);
        $current = $total = 0;

        $count = count($people);
        for ($i = 0; $i < $count; $i++) {
            if ($current + $people[$i] <= $limit) {
                $current += $people[$i];
                continue;
            }

            if ($people[$i] > $limit / 2) {
                $total++;
                $total += $count - $i;
                return $total;
            }

            $total++;
            $current = $people[$i];
        }

        $total += $current ? 1 : 0;
        return $total;
    }
}

$solution = new Solution();
var_dump($solution->numRescueBoats([5,1,4,2], 6)); // 2
var_dump($solution->numRescueBoats([3,8,7,1,4], 9)); // 3
var_dump($solution->numRescueBoats([1,2], 3)); // 1
var_dump($solution->numRescueBoats([3,2,2,1], 3)); // 3
var_dump($solution->numRescueBoats([3,5,3,4], 5)); // 4