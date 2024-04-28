<?php
class Solution {

    /**
     * @param String $s
     * @return String
     */
    function minRemoveToMakeValid($s) {
        $opens = [];

        $len = strlen($s);
        for ($i = 0; $i < $len; $i++) {
            if ($s[$i] === '(') {
                $opens[] = $i;
                continue;
            }

            if ($s[$i] === ')') {
                if ($opens) {
                    array_pop($opens);
                    continue;
                }

                $s[$i] = '_';
            }
        }

        foreach ($opens as $index) {
            $s[$index] = '_';
        }

        return str_replace('_', '', $s);
    }
}

$solution = new Solution();
var_dump($solution->minRemoveToMakeValid("))((")); // ""
var_dump($solution->minRemoveToMakeValid("lee(t(c)o)de)")); // "lee(t(c)o)de"
var_dump($solution->minRemoveToMakeValid("a)b(c)d")); // "ab(c)d"
var_dump($solution->minRemoveToMakeValid("(a(b(c)d)")); // "a(b(c)d)"