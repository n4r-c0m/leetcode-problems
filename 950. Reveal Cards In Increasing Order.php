<?php
class Solution {

    /**
     * @param Integer[] $deck
     * @return Integer[]
     */
    function deckRevealedIncreasing($deck) {
        $queue = [];
        rsort($deck);
        $queue[] = array_shift($deck);
        while($deck) {
            array_unshift($queue, array_pop($queue));
            array_unshift($queue, array_shift($deck));
        }

        return $queue;
    }
}

$solution = new Solution();
print_r($solution->deckRevealedIncreasing([17,13,11,2,3,5,7])); // [2,13,3,11,5,17,7]
print_r($solution->deckRevealedIncreasing([1,2,3,4,5,6])); // [1,4,2,6,3,5]
print_r($solution->deckRevealedIncreasing([1,2,3,4,5,6,7,8,9,10])); // [1,6,2,10,3,7,4,9,5,8]