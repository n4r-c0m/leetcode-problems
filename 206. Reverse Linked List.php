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
     * @param ListNode $head
     * @return ListNode
     */
    function reverseList($head) {
        while ($head) {
            $next = $head->next;
            $head->next = $prev;
            $prev = $head;
            $head = $next;
        }

        return $prev;
    }
}

function convertArrayToLinkedList($array)
{
    $current = $preHead = new ListNode();
    foreach ($array as $item) {
        $current->next = new ListNode($item);
        $current = $current->next;
    }

    return $preHead->next;
}

$solution = new Solution();
print_r($solution->reverseList(convertArrayToLinkedList([1, 2, 3, 4, 5]))); // [5, 4, 3, 2, 1]
print_r($solution->reverseList(convertArrayToLinkedList([1, 2]))); // [2, 1]
print_r($solution->reverseList(convertArrayToLinkedList([1]))); // [1]