<?php
class Solution {

    /**
     * @param Integer $n
     * @param Integer[][] $edges
     * @param Integer $source
     * @param Integer $destination
     * @return Boolean
     */
    function validPath($n, $edges, $source, $destination) {
        if ($source === $destination) {
            return true;
        }

        $connections = [];
        foreach ($edges as $edge) {
            $connections[$edge[0]][] = $edge[1];
            $connections[$edge[1]][] = $edge[0];
        }
        unset($edges);
        $queue = new SplQueue();
        array_map([$queue, 'enqueue'], @$connections[$source] ?? []);
        while (!$queue->isEmpty()) {
            $next = $queue->dequeue();
            if ($next === $destination) {
                return true;
            }

            array_map([$queue, 'enqueue'], @$connections[$next] ?? []);
            unset($connections[$next]);
        }

        return false;
    }
}

$solution = new Solution();
var_dump($solution->validPath(3, [[0,1],[1,2],[2,0]], 0, 2)); // true
var_dump($solution->validPath(6, [[0,1],[0,2],[3,5],[5,4],[4,3]], 0, 5)); // false
var_dump($solution->validPath(1, [], 0, 0)); // true