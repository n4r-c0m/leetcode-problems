<?php
class Solution {

    private $adjacents = [[0, 1], [0, -1], [1, 0], [-1, 0]];
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function numIslands($grid) {
        $result = 0;

        for ($y = 0; $y < count($grid); $y++) {
            for ($x = 0; $x < count($grid[$y]); $x++) {
                if ($grid[$y][$x] === '1') {
                    $this->convertGround($grid, $x, $y);
                    $result++;
                }
            }
        }

        return $result;
    }

    public function convertGround(&$grid, $x, $y)
    {
        $grid[$y][$x] = '0';

        foreach ($this->adjacents as $adjacent) {
            if (@$grid[$y + $adjacent[1]][$x + $adjacent[0]] === '1') {
                $this->convertGround($grid, $x + $adjacent[0], $y + $adjacent[1]);
            }
        }
    }
}

$solution = new Solution();
var_dump($solution->numIslands([["1","1","1","1","0"],["1","1","0","1","0"],["1","1","0","0","0"],["0","0","0","0","0"]])); // 1
var_dump($solution->numIslands([["1","1","0","0","0"],["1","1","0","0","0"],["0","0","1","0","0"],["0","0","0","1","1"]])); // 3
var_dump($solution->numIslands([["1","0","1","1","0","1","1"]])); // 3
