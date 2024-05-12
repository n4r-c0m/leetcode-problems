<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer[][]
     */
    function largestLocal($grid) {
        $result = [];

        for ($y = 1; $y < count($grid) - 1; $y++) {
            for ($x = 1; $x < count($grid[$y]) - 1; $x++) {
                $result[$y - 1][$x - 1] =
                    max(
                        max(array_slice($grid[$y - 1], $x - 1, 3)),
                        max(array_slice($grid[$y + 0], $x - 1, 3)),
                        max(array_slice($grid[$y + 1], $x - 1, 3)),
                    );
            }
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->largestLocal([[9,9,8,1],[5,6,2,6],[8,2,6,4],[6,2,2,2]])); // [[9,9],[8,6]]
print_r($solution->largestLocal([[1,1,1,1,1],[1,1,1,1,1],[1,1,2,1,1],[1,1,1,1,1],[1,1,1,1,1]])); // [[2,2,2],[2,2,2],[2,2,2]]