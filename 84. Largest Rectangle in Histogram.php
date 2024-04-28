<?php

class Solution {

    /**
     * @param Integer[] $heights
     * @return Integer
     */
    function largestRectangleArea($heights) {
        $stack = [];
        $result = 0;
        foreach ($heights as $index => $height) {
            $lastRemovedIndex = null;
            while (end($stack) > $height) {
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
            $width = count($heights) - key($stack);
            $result = max($width * array_pop($stack), $result);
        }

        return $result;
    }
}
$solution = new Solution();
var_dump($solution->largestRectangleArea([2,1,5,6])); // 10
var_dump($solution->largestRectangleArea([2,4])); // 4