<?php
class Solution {

    /**
     * @param Integer[][] $land
     * @return Integer[][]
     */
    function findFarmland($land) {
        $result = [];
        $numRows = count($land);
        for ($y = 0; $y < $numRows; $y++) {
            reset($land[$y]);
            for ($x = key($land[$y]); $x !== null; next($land[$y]), $x = key($land[$y])) {
                if ($land[$y][$x] === 0) {
                    continue;
                }

                $group = [$y, $x, 0, 0];
                for ($y2 = $y; $y2 < $numRows; $y2++) {
                    for ($x2 = $x; isset($land[$y2][$x2]); $x2++) {
                        if ($land[$y2][$x2] === 0) {
                            if ($x2 > $x) {
                                break;
                            }

                            break 2;
                        }

                        $group[2] = max($group[2], $y2);
                        $group[3] = max($group[3], $x2);

                        unset($land[$y2][$x2]);
                    }
                }

                reset($land);
                $y = max($y, key($land));
                $result[] = $group;
            }
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->findFarmland([[1,0,0],[0,1,1],[0,1,1]])); // [[0,0,0,0],[1,1,2,2]]
print_r($solution->findFarmland([[1,1],[1,1]])); // [[0,0,1,1]]
print_r($solution->findFarmland([[0]])); // []
print_r($solution->findFarmland([[1,1],[0,0]])); // [[0,0,0,1]]