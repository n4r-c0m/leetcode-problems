<?php
class Solution {

    /**
     * @param String $s
     * @param String $t
     * @return Boolean
     */
    function isIsomorphic($s, $t) {
        return $this->transform($s) === $this->transform($t);
    }

    public function transform($string)
    {
        $codes = [];
        for ($i = 0; $i < strlen($string); $i++) {
            if (!isset($codes[$string[$i]])) {
                $codes[$string[$i]] = count($codes);
            }

            $string[$i] = $codes[$string[$i]];
        }

        return $string;
    }
}

$solution = new Solution();
var_dump($solution->isIsomorphic("egg", "add")); // true
var_dump($solution->isIsomorphic("foo", "bar")); // false
var_dump($solution->isIsomorphic("paper", "title")); // true
var_dump($solution->isIsomorphic("bbbaaaba", "aaabbbba")); // false