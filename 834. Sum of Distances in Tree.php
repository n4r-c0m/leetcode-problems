<?php

class Solution {

    private $edges = [];
    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @return Integer[]
     */
    function sumOfDistancesInTree($n, $edges) {
        foreach ($edges as $edge) {
            $this->edges[$edge[0]][] = $edge[1];
            $this->edges[$edge[1]][] = $edge[0];
        }

        return array_map([$this, 'dist'], range(0, $n - 1));
    }

    protected function dist($from)
    {
        $result = 0;
        $visited = [$from => true];

        $queue = new SplQueue();
        $queue->enqueue([$from, 0]);
        while (!$queue->isEmpty()) {
            list($current, $pathLength) = $queue->dequeue();
            foreach ($this->edges[$current] as $destination) {
                if (isset($visited[$destination])) {
                    continue;
                }

                $visited[$destination] = true;
                $result += $pathLength + 1;
                $queue->enqueue([$destination, $pathLength + 1]);
            }
        }

        return $result;
    }
}

$solution = new Solution();
print_r($solution->sumOfDistancesInTree(6, [[0,1],[0,2],[2,3],[2,4],[2,5]])); // [8,12,6,10,10,10]
