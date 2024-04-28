<?php
class ListNode {
    public $val = 0;
    public $next = null;
    function __construct($val = 0, $next = null) {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution {

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        $result = new ListNode();
        $resultNextNode = $result;

        while ($l1 || $l2 || $carry) {
            $sum = $l1?->val + $l2?->val + $carry;

            $carry = (int)($sum / 10);
            $sum = $sum % 10;

            $l1 = $l1?->next;
            $l2 = $l2?->next;
            $resultNextNode = $resultNextNode->next = new ListNode($sum);
        }

        return $result->next;
    }
}

$l1 = new ListNode(2, new ListNode(4, new ListNode(3)));
$l2 = new ListNode(5, new ListNode(6, new ListNode(4)));
$solution = new Solution();
print_r($solution->addTwoNumbers($l1, $l2));
