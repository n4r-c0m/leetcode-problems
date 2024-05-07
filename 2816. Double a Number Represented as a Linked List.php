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
    function doubleIt($head) {
        if ($head->val > 4) {
            $head = new ListNode(0, $head);
        }

        $curr = $head;
        while ($curr) {
            $curr->val = $curr->val * 2 % 10;
            if ($curr->next && $curr->next->val > 4) {
                $curr->val += 1;
            }

            $curr = $curr->next;
        }

        return $head;
    }
}
