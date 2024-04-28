<?php
class Solution {

    private $adjacents = [[0, 1], [0, -1], [1, 0], [-1, 0]];
    /**
     * @param Integer[][] $grid
     * @return Integer
     */
    function islandPerimeter($grid) {
        for ($y = 0; $y < count($grid); $y++) {
            for ($x = 0; $x < count($grid[$y]); $x++) {
                if ($grid[$y][$x] === 1) {
                    $amountOfGroundCells = $this->convertGround($grid, $x, $y);
                    $amountOfGroundFacingEdges = -array_sum(array_map('array_sum', $grid));

                    return $amountOfGroundCells * 4 - $amountOfGroundFacingEdges;
                }
            }
        }
    }

    public function convertGround(&$grid, $x, $y)
    {
        if ($grid[$y][$x] <= 0) {
            return 0;
        }

        $amountOfGroundCells = 1;
        $groundFacingEdges = 0;

        foreach ($this->adjacents as $adjacent) {
            if (@abs($grid[$y + $adjacent[1]][$x + $adjacent[0]]) > 0) {
                $groundFacingEdges++;
            }
        }

        $grid[$y][$x] = -$groundFacingEdges;

        foreach ($this->adjacents as $adjacent) {
            if (@$grid[$y + $adjacent[1]][$x + $adjacent[0]] === 1) {
                $amountOfGroundCells += $this->convertGround($grid, $x + $adjacent[0], $y + $adjacent[1]);
            }
        }

        return $amountOfGroundCells;
    }
}

$solution = new Solution();
var_dump($solution->islandPerimeter([[0,1,0,0],[1,1,1,0],[0,1,0,0],[1,1,0,0]])); // 16
var_dump($solution->islandPerimeter([[1]])); // 4
var_dump($solution->islandPerimeter([[1,0]])); // 4
