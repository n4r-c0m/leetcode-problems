<?php

class Solution {

    /**
     * @param String $s
     * @return String
     */
    function maximumOddBinaryNumber($s) {
        $len = strlen($s);
        $charCount = ['0' => 0, '1' => 0];
        for ($i = 0; $i < $len; $i++) {
            $charCount[$s[$i]]++;
        }

        return
            str_repeat('1', $charCount['1'] - 1)
            . str_repeat('0', $charCount['0'])
            . '1';
    }
}

$solution = new Solution();
echo $solution->maximumOddBinaryNumber('010') . "\n";
echo $solution->maximumOddBinaryNumber('0101') . "\n";
echo $solution->maximumOddBinaryNumber('1111') . "\n";