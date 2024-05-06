<?php

require_once 'utils/ListNode.php';

class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function removeNodes($head) {
        $head = $this->invert($head);
        $node = $head;

        $max = PHP_INT_MIN;
        while ($node->next) {
            $max = max($max, $node->val);

            if ($node->next->val < $max) {
                $node->next = $node->next->next;
                continue;
            }

            $node = $node->next;
        }

        return $this->invert($head);
    }

    /**
     * @param $head
     * @return ListNode
     */
    private function invert($head)
    {
        $next = $head->next;
        $head->next = null;
        while ($next) {
            $temp = $next->next;
            $next->next = $head;
            $head = $next;
            $next = $temp;
        }

        return $head;
    }
}

$solution = new Solution();
var_dump($solution->removeNodes(ListNode::fromArray([5,2,13,3,8]))); // [13,8]
