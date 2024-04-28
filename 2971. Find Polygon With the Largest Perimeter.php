<?php

class Solution
{

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function largestPerimeter($nums)
    {
        sort($nums);

        $largestPerimeter = -1;

        $currentPerimeter = $nums[0] + $nums[1];
        for ($index = 2, $count = count($nums); $index < $count; $index++) {
            if ($currentPerimeter > $nums[$index]) {
                $currentPerimeter += $nums[$index];
                $largestPerimeter = $currentPerimeter;
                continue;
            }

            $currentPerimeter += $nums[$index];
        }

        return $largestPerimeter;
    }
}

$nums = [1, 12, 1, 2, 5, 50, 3];
$solution = new Solution();
echo $solution->largestPerimeter($nums);
