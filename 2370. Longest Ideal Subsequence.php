<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return Integer
     */
    function longestIdealString($s, $k) {
        $a = array_map('ord', str_split($s));
        $c = [];

        $len = count($a);
        for ($i = 0; $i < $len; $i++) {
            $from = max(97, $a[$i] - $k);
            $to = min(122, $a[$i] + $k);

            for ($i2 = $from; $i2 <= $to; $i2++) {
                if (!isset($c[$i2])) {
                    continue;
                }

                $c[$i2]++;
            }

            $c[$a[$i]] = @$c[$a[$i]] ?? 1;
        }

        return max($c);
    }
}

$solution = new Solution();
print_r($solution->longestIdealString("acfgbd", 2)); //4
print_r($solution->longestIdealString("pvjcci", 4)); //2
print_r($solution->longestIdealString("abcd", 3)); //4
