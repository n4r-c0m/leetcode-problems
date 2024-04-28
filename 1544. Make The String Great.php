<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function makeGood($s) {
        $ar = [];
        $len = strlen($s);
        for ($right = 0; $right < $len; $right++) {
            $left = end($ar);
            if ($s[$right] !== $left && strtolower($s[$right]) === strtolower($left)) {
                array_pop($ar);
                continue;
            }

            $ar[] = $s[$right];
        }

        return implode($ar);
    }
}

$solution = new Solution();
var_dump($solution->makeGood("NAanorRoOrROwnTNW")); // "wnTNW"
var_dump($solution->makeGood("hKhHkHjgGJEiBbIe")); // ""
var_dump($solution->makeGood("leEeetcode")); // "leetcode"
var_dump($solution->makeGood("abBAcC")); // ""
var_dump($solution->makeGood("s")); // "s"
var_dump($solution->makeGood("mC")); // "mC"