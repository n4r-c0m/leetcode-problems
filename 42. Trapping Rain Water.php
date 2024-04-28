<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap2($height) {
        $maxLeft = $maxRight = [];
        $result = $currentMaxLeft = $currentMaxRight = 0;
        $count = count($height);
        for ($i = 0; $i < $count; $i++) {
            $maxLeft[$i] = $currentMaxLeft = max($currentMaxLeft, $height[$i]);
            $maxRight[$count - $i - 1] = $currentMaxRight = max($currentMaxRight, $height[$count - $i - 1]);
        }

        for ($i = 0; $i < $count; $i++) {
            $result += max(0, min($maxLeft[$i], $maxRight[$i]) - $height[$i]);
        }

        return $result;
    }

    function trap($height) {
        $n = count($height);
        if ($n == 0) {
            return 0;
        }

        $left = 0;
        $right = $n - 1;
        $leftMax = $height[$left];
        $rightMax = $height[$right];
        $result = 0;

        while ($left < $right) {
            if ($height[$left] < $height[$right]) {
                if ($height[$left] >= $leftMax) {
                    $leftMax = $height[$left];
                } else {
                    $result += $leftMax - $height[$left];
                }

                $left += 1;
            } else {
                if ($height[$right] >= $rightMax) {
                    $rightMax = $height[$right];
                } else {
                    $result += $rightMax - $height[$right];
                }

                $right -= 1;
            }
        }

        return $result;
    }
}

$solution = new Solution();
echo $solution->trap([0,1,0,2,1,0,1,3,2,1,2,1]); // 6
echo $solution->trap([4,2,0,3,2,5]); // 9
