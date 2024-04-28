<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function findMinHeightTrees($n, $edges) {
        $connections = array_fill(0, $n, []);
        $degrees = array_fill(0, $n, 0);

        foreach ($edges as $edge) {
            $connections[$edge[0]][] = $edge[1];
            $connections[$edge[1]][] = $edge[0];

            $degrees[$edge[0]]++;
            $degrees[$edge[1]]++;
        }

        while (max($degrees) > 1) {
            $leafIndexes = array_filter($degrees, fn($val) => $val === 1);
            foreach ($leafIndexes as $leafIndex => $unused) {
                unset($degrees[$leafIndex]);
                foreach ($connections[$leafIndex] as $connection) {
                    isset($degrees[$connection]) ? @$degrees[$connection]-- : null;
                }
            }
        }

        return array_keys($degrees);
    }
}

$solution = new Solution();
var_dump($solution->findMinHeightTrees(7, [[3,0],[3,1],[3,2],[3,4],[5,4],[6,0]]));
var_dump($solution->findMinHeightTrees(4, [[1,0],[1,2],[1,3]])); // [1]
var_dump($solution->findMinHeightTrees(6, [[3,0],[3,1],[3,2],[3,4],[5,4]])); // [3,4]
var_dump($solution->findMinHeightTrees(1, [])); // [0]
var_dump($solution->findMinHeightTrees(2, [[0,1]])); // [0,1]