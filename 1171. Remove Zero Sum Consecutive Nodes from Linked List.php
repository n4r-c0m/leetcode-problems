<?php

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
     * @return ListNode
     */
    function removeZeroSumSublists($head)
    {
        $sums = [];
        $preHead = new ListNode(null, $head);
        $previous = $preHead;

        $sum = 0;
        while ($previous->next) {
            $sum += $previous->next->val;
            if ($sum === 0) {
                $preHead->next = $previous->next->next;
                $previous = $preHead;
                $sums = [];
                continue;
            }

            if (isset($sums[$sum])) {
                $sums[$sum]->next->next = $previous->next->next;
                $sum = 0;
                $sums = [];
                $previous = $preHead;
                continue;
            }

            $sums[$sum] = $previous;
            $previous = $previous->next;
        }

        print_r($preHead->next);

        return $preHead->next;
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
//$solution->removeZeroSumSublists(convertArrayToLinkedList([1, 2, -3, 3, 1]));
$solution->removeZeroSumSublists(convertArrayToLinkedList([1, 2, 3, -3, 4]));
//$solution->removeZeroSumSublists(convertArrayToLinkedList([1, 2, 3, -3, -2]));
//$solution->removeZeroSumSublists(convertArrayToLinkedList([-10, -10, -10, 30]));
