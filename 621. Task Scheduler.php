<?php
class Solution {

    /**
     * @param String[] $tasks
     * @param Integer $n
     * @return Integer
     */
    function leastInterval($tasks, $n) {
        $heap = new SplMaxHeap();
        $counts = array_count_values($tasks);
        $waitQueue = [];
        foreach ($counts as $char => $charCount) {
            $heap->insert([$charCount, $char]);
        }

        $sequenceSteps = 0;
        while (!$heap->isEmpty() || $waitQueue) {
            $sequenceSteps++;
            if ($waitQueue) {
                $element = array_shift($waitQueue);
                if ($element) {
                    $heap->insert($element);
                }
            }

            if (!$heap->isEmpty()) {
                $char = $heap->extract();
                if (--$char[0]) {
                    $c = max(0, $n - count($waitQueue));
                    $waitQueue = array_merge(
                        $waitQueue,
                        array_fill(0, $c, null),
                    );

                    $waitQueue[] = $char;
                }
            }
        }

        return $sequenceSteps;
    }
}

$solution = new Solution();
print_r($solution->leastInterval(["A","A","A","B","B","B"], 2) . "\n"); // 8
print_r($solution->leastInterval(["A","A","A","B","B","B"], 0) . "\n"); // 6
print_r($solution->leastInterval(["A","A","A","A","A","A","B","C","D","E","F","G"], 2) . "\n"); // 16