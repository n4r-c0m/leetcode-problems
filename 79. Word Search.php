<?php
class Solution {
    protected $options = [
        [0, 1],
        [0, -1],
        [1, 0],
        [-1, 0],
    ];

    /**
     * @param String[][] $board
     * @param String $word
     * @return Boolean
     */
    function exist($board, $word) {
        for ($y = 0; $y < count($board); $y++) {
            for ($x = 0; $x < count($board[$y]); $x++) {
                if ($board[$y][$x] !== $word[0]) {
                    continue;
                }

                if ($this->try($board, substr($word, 1), $x, $y)) {
                    return true;
                }
            }
        }

        return false;
    }

    protected function try($board, $word, $curX, $curY)
    {
        if (!strlen($word)) {
            return true;
        }

        $board[$curY][$curX] = null;

        foreach ($this->options as $option) {
            if (@$board[$curY + $option[0]][$curX + $option[1]] !== $word[0]) {
                continue;
            }

            if ($this->try($board, substr($word, 1), $curX + $option[1], $curY + $option[0])) {
                return true;
            }
        }

        return false;
    }
}

$solution = new Solution();
var_dump($solution->exist([["C","A","A"],["A","A","A"],["B","C","D"]], "AAB")); // true
//var_dump($solution->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCCED")); // true
//var_dump($solution->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "SEE")); // true
//var_dump($solution->exist([["A","B","C","E"],["S","F","C","S"],["A","D","E","E"]], "ABCB")); // false
