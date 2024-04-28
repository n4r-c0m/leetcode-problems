<?php

class Solution {

    /**
     * @param String $order
     * @param String $s
     * @return String
     */
    function customSortString($order, $s) {
        $arr = count_chars($s);
        $result = '';
        for ($i = 0, $len = strlen($order); $i < $len; $i++) {
            $result .= str_repeat($order[$i], @$arr[$order[$i]] ?? 0);
            unset($arr[$order[$i]]);
        }

        foreach ($arr as $char => $count) {
            $result .= str_repeat($char, $count);
        }

        return $result;
    }
}

$solution = new Solution();
echo $solution->customSortString('cba', 'abcd') . "\n"; //cbad
echo $solution->customSortString('kqep', 'pekeq') . "\n"; //kqeep
