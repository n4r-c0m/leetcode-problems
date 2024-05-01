<?php
class Solution {

    /**
     * @param String $word
     * @param String $ch
     * @return String
     */
    function reversePrefix($word, $ch) {
        $pos = strpos($word, $ch);
        if ($pos === false) {
            return $word;
        }

        return strrev(
            substr($word, 0, $pos + 1),
        ) . substr($word, $pos + 1);
    }
}

$solution = new Solution();
var_dump($solution->reversePrefix("aaaab", "b")); // baaaa
var_dump($solution->reversePrefix("abcdefd", "d")); // dcbaefd
var_dump($solution->reversePrefix("xyxzxe", "z")); // zxyxxe
var_dump($solution->reversePrefix("abcd", "z")); // abcd
