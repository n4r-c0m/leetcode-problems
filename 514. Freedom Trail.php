<?php

class Solution {
    private $cache = [];
    /**
     * @param String $ring
     * @param String $key
     * @return Integer
     */
    function findRotateSteps($ring, $key, $initialPos = 0) {
        if (!$key) {
            return 0;
        }

        if (isset($this->cache[$key][$initialPos])) {
            return $this->cache[$key][$initialPos];
        }

        $lastPos = 0;
        while (($lastPos = strpos($ring, $key[0], $lastPos)) !== false) {
            $positions[] = $lastPos;
            $lastPos = $lastPos + 1;
        }

        $options = [];
        foreach ($positions as $position) {
            $moves = min(
                abs($initialPos - $position),
                abs(strlen($ring) - $initialPos + $position)
            );
            $a = 1;
            $options[] =
                1
                + min(
                    abs($initialPos - $position),
                    abs(strlen($ring) - $position + $initialPos),
                    abs(strlen($ring) - $initialPos + $position),
                )
                + $this->findRotateSteps(
                    $ring,
                    substr($key, 1),
                    $position,
                  );
        }

        return $this->cache[$key][$initialPos] = min($options);
    }
}

//  |       1
// -------- 8
//      ^   5

$solution = new Solution();
var_dump($solution->findRotateSteps("caotmcaataijjxi", "io")); // 6
$solution = new Solution();
var_dump($solution->findRotateSteps("caotmcaataijjxi", "oatjii")); // 18
$solution = new Solution();
var_dump($solution->findRotateSteps("caotmcaataijjxi", "oatjiio")); // 23
$solution = new Solution();
var_dump($solution->findRotateSteps("caotmcaataijjxi", "oatjiioicitatajtijciocjcaaxaaatmctxamacaamjjx"));
$solution = new Solution();
var_dump($solution->findRotateSteps("godding", "gd")); //4
$solution = new Solution();
var_dump($solution->findRotateSteps("godding", "godding")); //13