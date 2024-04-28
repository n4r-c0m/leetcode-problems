<?php

class Solution {

    /**
     * @param Integer[] $tokens
     * @param Integer $power
     * @return Integer
     */
    function bagOfTokensScore($tokens, $power) {
        sort($tokens);
        $left = 0;
        $right = count($tokens) - 1;
        $maxScore = $score = 0;

        while ($left <= $right) {
            if ($tokens[$left] <= $power) {
                $power -= $tokens[$left];
                $score++;
                $left++;
                $maxScore = max($maxScore, $score);
                continue;
            }

            if (!$score) {
                return $maxScore;
            }

            $score--;
            $power += $tokens[$right];
            $right--;
        }

        return $maxScore;
    }
}

$solution = new Solution();
var_dump($solution->bagOfTokensScore([100], 50)); // 0
var_dump($solution->bagOfTokensScore([100, 200], 150)); // 1
var_dump($solution->bagOfTokensScore([100, 200, 300, 400], 200)); // 2