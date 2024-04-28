<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLastWord($s) {
        $s = rtrim($s);
        $result = 0;
        $i = strlen($s);
        while ($i > 0 || $s[--$i] != ' ') {
            $result++;
        }

        return $result;
    }
}