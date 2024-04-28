<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $n = strlen($s);
        $set = [];
        $ans = 0;
        $i = 0;
        $j = 0;
        while ($i < $n && $j < $n) {
            if (!isset($set[$s[$j]])) {
                $set[$s[$j++]] = true;
                $ans = max($ans, $j - $i);
            } else {
                unset($set[$s[$i++]]);
            }
        }
        return $ans;
    }
}

$s = " ";
$solution = new Solution();
echo $solution->lengthOfLongestSubstring($s);