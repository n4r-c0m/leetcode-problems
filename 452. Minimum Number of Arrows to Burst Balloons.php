<?php

class Solution
{

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function findMinArrowShots($points)
    {
        usort($points, fn($a, $b) => $a > $b ? 1 : -1);

        $initial = reset($points);
        $arrows = 1;
        while ($compareTo = next($points)) {
            if ($compareTo[0] <= $initial[1]) {
                $initial = [
                    max($initial[0], $compareTo[0]),
                    min($initial[1], $compareTo[1]),
                ];
                continue;
            }

            $arrows++;
            $initial = $compareTo;
        }

        return $arrows;
    }
}

$solution = new Solution();
//print_r($solution->findMinArrowShots([[10, 16], [2, 8], [1, 6], [7, 12]])); // 2
//print_r($solution->findMinArrowShots([[1, 2], [3, 4], [5, 6], [7, 8]])); // 4
//print_r($solution->findMinArrowShots([[1, 2], [2, 3], [3, 4], [4, 5]])); // 2
print_r($solution->findMinArrowShots([[3,9],[7,12],[3,8],[6,8],[9,10],[2,9],[0,9],[3,9],[0,6],[2,8]])); // 2