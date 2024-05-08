<?php

class Solution {

    /**
     * @param Integer[] $score
     * @return String[]
     */
    function findRelativeRanks($score) {
        $sorted = $score;
        rsort($sorted);
        $sorted = array_flip($sorted);

        $result = [];
        foreach ($score as $item) {
            $result[] = match ($sorted[$item]) {
                0 => 'Gold Medal',
                1 => 'Silver Medal',
                2 => 'Bronze Medal',
                default => (string)($sorted[$item] + 1)
            };
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->findRelativeRanks([5, 4, 3, 2, 1])); // ["Gold Medal", "Silver Medal", "Bronze Medal", "4", "5"]
print_r($solution->findRelativeRanks([10, 3, 8, 9, 4])); // ["Gold Medal", "5", "Bronze Medal", "Silver Medal", "4"]
