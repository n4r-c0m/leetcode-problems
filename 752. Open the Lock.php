<?php

class Solution {

    /**
     * @param String[] $deadends
     * @param String $target
     * @return Integer
     */
    function openLock($deadends, $target) {
        if (in_array('0000', $deadends)) {
            return -1;
        }

        if ($target === '0000') {
            return 0;
        }

        $visited = array_fill_keys($deadends, 1);

        $queue = new SplQueue();
        $queue->enqueue(['0000', 0]);

        while (!$queue->isEmpty()) {
            list($lock, $turn) = $queue->dequeue();
            foreach ($this->children($lock) as $child) {
                if (isset($visited[$child])) {
                    continue;
                }

                $visited[$child] = 1;

                if ($child === $target) {
                    return $turn + 1;
                }

                $queue->enqueue([$child, $turn + 1]);
            }
        }

        return -1;
    }

    protected function children($lock)
    {
        $children = [];
        for ($i = 0; $i < 4; $i++) {
            $child = $lock;
            $child[$i] = ($child[$i] + 1) % 10;
            $children[] = $child;
            $child = $lock;
            $child[$i] = ($child[$i] + 10 - 1) % 10;
            $children[] = $child;
        }

        return $children;
    }
}

$solution = new Solution();
var_dump($solution->openLock(["0201","0101","0102","1212","2002"], "0202")); // 6
var_dump($solution->openLock(["8888"], "0009")); // 1
var_dump($solution->openLock(["8887","8889","8878","8898","8788","8988","7888","9888"], "8888")); // -1