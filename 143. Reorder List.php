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
     * @return NULL
     */
    function reorderList($head) {
        $fast = $slow = $head;
        while ($fast?->next) {
            $fast = $fast->next->next;
            $slow = $slow->next;
        }
        if ($fast) {
            $slow = $slow->next;
        }
        unset($fast);

        $secondHalf = null;
        $pointer = $slow;
        while ($pointer) {
            $temp = $pointer->next;
            $pointer->next = $secondHalf;
            $secondHalf = $pointer;
            $pointer = $temp;
        }

        $pointer = $head;
        while ($secondHalf) {
            $temp = $pointer->next;
            $pointer->next = $secondHalf;
            $secondHalf = $secondHalf->next;
            $pointer->next->next = $temp;
            $pointer = $temp;
        }
        $pointer->next = null;

        return $head;
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
print_r($solution->reorderList(convertArrayToLinkedList([1, 2, 3, 4]))); // [1, 4, 2, 3]
print_r($solution->reorderList(convertArrayToLinkedList([1, 2, 3, 4, 5]))); // [1, 5, 2, 4, 3]
print_r($solution->reorderList(convertArrayToLinkedList([1, 2, 3, 4, 5, 6]))); // [1, 6, 2, 5, 3, 4]