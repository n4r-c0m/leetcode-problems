<?php

class Solution {
    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraysWithKDistinct($nums, $k) {
        $farLeft = $nearLeft = 0;
        $counts = [];
        $result = 0;

        for ($right = 0; $right < count($nums); $right++) {
            @$counts[$nums[$right]]++;
            if (count($counts) < $k) {
                continue;
            }

            while (count($counts) > $k) {
                $farLeft = max($farLeft, $nearLeft);
                $counts[$nums[$farLeft]]--;
                if (!$counts[$nums[$farLeft]]) {
                    unset($counts[$nums[$farLeft]]);
                }

                $nearLeft = ++$farLeft;
            }

            while (count($counts) === $k && $counts[$nums[$nearLeft]] > 1) {
                $counts[$nums[$nearLeft]]--;
                if (!$counts[$nums[$nearLeft]]) {
                    unset($counts[$nums[$nearLeft]]);
                }
                $nearLeft++;
            }

            $result += $nearLeft - $farLeft + 1;
        }

        return $result;
    }
}

class Solution2
{
    function subarraysWithKDistinct($nums, $k)
    {
        return $this->subarraysAtMostK($nums, $k) - $this->subarraysAtMostK($nums, $k - 1);
    }

    function subarraysAtMostK($nums, $k)
    {
        $hash = [];
        $left = $result = 0;
        for ($i = 0; $i < count($nums); $i++) {
            @$hash[$nums[$i]]++;
            while (count($hash) > $k) {
                $hash[$nums[$left]]--;
                if (!$hash[$nums[$left]]) {
                    unset($hash[$nums[$left]]);
                }
                $left++;
            }
            $result += $i - $left + 1;
        }
        return $result;
    }
}

$solution = new Solution2();
var_dump($solution->subarraysWithKDistinct([1, 2, 1, 2, 3], 2)); // 7
var_dump($solution->subarraysWithKDistinct([2, 1, 2, 1, 2], 2)); // 10
var_dump($solution->subarraysWithKDistinct([2, 1, 1, 1, 2], 1)); // 8
var_dump($solution->subarraysWithKDistinct([1, 2, 1, 3, 4], 3)); // 3
var_dump($solution->subarraysWithKDistinct([1, 2, 1, 2, 3], 3)); // 3