<?php

class Solution {

    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function matrixScore($grid) {
        $count = count($grid);
        for ($y = 0; $y < $count; $y++) {
            if ($grid[$y][0] === 0) {
                $this->flipRow($grid, $y);
            }
        }

        for ($x = 0; $x < count($grid[0]); $x++) {
            $countOfZeros = 0;
            for ($y = 0; $y < count($grid); $y++) {
                $countOfZeros += $grid[$y][$x] === 0 ? 1 : 0;
            }

            if ($countOfZeros > floor(count($grid) / 2)) {
                $this->flipColumn($grid, $x);
            }
        }

        $result = 0;
        for ($y = 0; $y < $count; $y++) {
            $result += bindec(implode('', $grid[$y]));
        }

        return $result;
    }

    private function flipRow(&$grid, $y)
    {
        $count = count($grid[$y]);
        for ($x = 0; $x < $count; $x++) {
            $grid[$y][$x] = $grid[$y][$x] === 1 ? 0 : 1;
        }
    }

    private function flipColumn(&$grid, $x)
    {
        $count = count($grid);
        for ($y = 0; $y < $count; $y++) {
            $grid[$y][$x] = $grid[$y][$x] === 1 ? 0 : 1;
        }
    }
}

$solution = new Solution();
var_dump($solution->matrixScore([[0,0,1,1],[1,0,1,0],[1,1,0,0]])); // 39
var_dump($solution->matrixScore([[0]])); // 1