<?php

class Solution {

    /**
     * @param String $word
     * @return Integer
     */
    function wonderfulSubstrings($word) {
        $len = strlen($word);
        $count = array_fill(0, 1024, 0);
        $count[0] = 1;
        $mask = 0;
        $result = 0;

        for ($i = 0; $i < $len; $i++) {
            $mask ^= 1 << (ord($word[$i]) - ord('a'));
            $result += $count[$mask];
            for ($j = 0; $j < 10; $j++) {
                $result += $count[$mask ^ (1 << $j)];
            }
            $count[$mask]++;
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->wonderfulSubstrings("aba")); // 4
var_dump($solution->wonderfulSubstrings("aabb")); // 9
var_dump($solution->wonderfulSubstrings("he")); // 2