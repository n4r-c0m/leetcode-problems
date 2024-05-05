<?php

class Solution {
    /**
     * @param ListNode $node
     * @return
     */
    function deleteNode($node) {
        $node->val = $node->next->val;
        $node->next = $node->next->next;
    }
}
