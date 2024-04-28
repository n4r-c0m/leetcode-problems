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

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $head
     * @return Boolean
     */
    function isPalindrome($head)
    {
        $slow = $fast = $head;
        $prev = null;
        while ($fast && $fast->next) {
            $fast = $fast->next->next;
            $next = $slow->next;
            $slow->next = $prev;
            $prev = $slow;
            $slow = $next;
        }

        if ($fast) {
            $slow = $slow->next;
        }

        while ($prev) {
            if ($prev->val !== $slow->val) {
                return false;
            }

            $prev = $prev->next;
            $slow = $slow->next;
        }

        return true;
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
var_dump($solution->isPalindrome(convertArrayToLinkedList([1, 1, 2, 1]))); // false
var_dump($solution->isPalindrome(convertArrayToLinkedList([1, 2, 3, 4, 5, 5, 4, 3, 2, 1]))); // true
var_dump($solution->isPalindrome(convertArrayToLinkedList([1, 2]))); // false