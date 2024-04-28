<?php
class Solution {

    /**
     * @param Integer[][] $intervals
     * @param Integer[] $newInterval
     * @return Integer[][]
     */
    function insert($intervals, $newInterval) {
        $results = [];
        $count = count($intervals);
        $i = 0;

        while ($i < $count && $intervals[$i][1] < $newInterval[0]) {
            $results[] = $intervals[$i];
            $i++;
        }

        $newElementStart = min(
            @$intervals[$i][0] ?? PHP_INT_MAX,
            $newInterval[0],
        );

        while ($i < $count && $intervals[$i][1] < $newInterval[1]) {
            $i++;
        }

        if ($i >= $count) {
            $results[] = [
                $newElementStart,
                $newInterval[1],
            ];

            return $results;
        }

        if ($intervals[$i][0] > $newInterval[1]) {
            $results[] = [
                $newElementStart,
                $newInterval[1],
            ];
        } else {
            $results[] = [
                $newElementStart,
                max($newInterval[1], $intervals[$i][1]),
            ];

            $i++;
        }

        if ($i < $count) {
            $results = array_merge($results, array_slice($intervals, $i));
        }

        return $results;
    }
}

$solution = new Solution();
//print_r($solution->insert([[1, 3], [6, 9]], [2, 5])); // [[1, 5], [6, 9]]
//print_r($solution->insert([[1, 2], [3, 5], [6, 7], [8, 10], [12, 16]], [4, 8])); // [[1, 2], [3, 10], [12, 16]]
print_r($solution->insert([[1, 2], [3, 5], [6, 7], [8, 10], [12, 16]], [17, 18])); // [[1, 2], [3, 5], [6, 7], [8, 10], [12, 16], [17, 18]]