<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    /**
     * @param ListNode $head
     * @return ListNode
     */
    function doubleIt($head, $convertLeadingTen = true) {
        if (!$head) {
            return;
        }

        $this->doubleIt($head->next, false);
        $head->val *= 2;

        if ($head->next) {
            if ($head->next->val > 9) {
                $head->next->val -= 10;
                $head->val += 1;
            }
        }

        if ($convertLeadingTen) {
            if ($head->val > 9) {
                $head->val -= 10;
                $lead = new ListNode(1, $head);
                $head = $lead;
            }
        }

        return $head;
    }
}
