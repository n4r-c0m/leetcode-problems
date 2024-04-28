<?php
class Solution {

    /**
     * @param String[][] $matrix
     * @return Integer
     */
    function maximalRectangle($matrix) {
        $rows = count($matrix);
        if ($rows == 0) {
            return 0;
        }

        $columns = count($matrix[0]);
        $heights = array_fill(0, $columns, 0);
        $result = 0;
        for ($i = 0; $i < $rows; $i++) {
            for ($j = 0; $j < $columns; $j++) {
                $heights[$j] = $matrix[$i][$j] == "1" ? $heights[$j] + 1 : 0;
            }

            $stack = [];
            foreach ($heights as $index => $height) {
                $lastRemovedIndex = null;
                while ($stack && end($stack) > $height) {
                    $lastIndex = key($stack);
                    $width = $index - $lastIndex;
                    $lastHeight = array_pop($stack);
                    $result = max($width * $lastHeight, $result);
                    $lastRemovedIndex = $lastIndex;
                }

                $stack[$lastRemovedIndex ?? $index] = $height;
            }

            while ($stack) {
                end($stack);
                $width = $columns - key($stack);
                $result = max($width * array_pop($stack), $result);
            }
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->maximalRectangle([["1","0","1","0","0"],["1","0","1","1","1"],["1","1","1","1","1"],["1","0","0","1","0"]])); // 6
var_dump($solution->maximalRectangle([])); // 0