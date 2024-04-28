<?php
class Solution {

    /**
     * @param int $n
     * @param int[][] $trust
     * @return int
     */
    function findJudge($n, $trust) {
        if ($n == 1) {
            return 1;
        }

        $notJudges = $trustReceived = array_fill(1, $n, 0);

        foreach ($trust as $pair) {
            $notJudges[$pair[0]] = true;
            $trustReceived[$pair[1]]++;
        }

        $possibleJudge = null;
        foreach ($trustReceived as $index => $trustLevel) {
            if ($trustLevel == $n - 1) {
                if ($notJudges[$index]) {
                    continue;
                }

                if ($possibleJudge) {
                    // There must be only one judge
                    return -1;
                }

                $possibleJudge = $index;
            }
        }

        return $possibleJudge ?? -1;
    }
}

$solution = new Solution();
$n = 3;
$trust = [[1,2]];
echo $solution->findJudge($n, $trust);
