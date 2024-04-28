<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer $k
     * @return Integer
     */
    function kthGrammar($n, $k) {
        $prev = null;
        for ($index = 1; $index <= $n; $index++) {
            if ($index == 1) {
                $prev = '0';
                echo $prev . "\n";
                continue;
            }

            $prev = str_replace(
                ['0', '1'],
                ['oi', 'io'],
                $prev
            );

            $prev = str_replace(
                ['o', 'i'],
                ['0', '1'],
                $prev
            );

            echo $prev . "\n";
        }
    }
}

$solution = new Solution();
$solution->kthGrammar(8, 0);