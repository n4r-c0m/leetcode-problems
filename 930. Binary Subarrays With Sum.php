<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $goal
     * @return Integer
     */
    function numSubarraysWithSum($nums, $goal) {
        return
            $this->numSubarraysWithSumEqOrLower($nums, $goal)
            - $this->numSubarraysWithSumEqOrLower($nums, $goal - 1);
    }

    /**
     * @param array $nums
     * @param int $goal
     * @return int|void
     */
    public function numSubarraysWithSumEqOrLower($nums, $goal)
    {
        if ($goal < 0) {
            return 0;
        }

        $result = 0;
        $left = $current = 0;
        for ($right = 0, $count = count($nums); $right < $count; $right++) {
            $current += $nums[$right];
            while ($current > $goal) {
                $current -= $nums[$left];
                $left++;
            }

            $result += $right - $left + 1;
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->numSubarraysWithSum([1, 0, 1, 0, 1], 2)); // 4
var_dump($solution->numSubarraysWithSum([0, 0, 0, 0, 0], 0)); // 15
var_dump($solution->numSubarraysWithSum([0, 0, 0, 0, 0, 0, 0, 0, 0, 0], 0)); // 55
var_dump($solution->numSubarraysWithSum([1, 0, 1, 0, 1, 0, 1], 2)); // 8
var_dump($solution->numSubarraysWithSum([1, 0, 1, 0, 1, 0, 1, 0, 1], 2)); // 12
var_dump($solution->numSubarraysWithSum([1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1], 2)); // 16