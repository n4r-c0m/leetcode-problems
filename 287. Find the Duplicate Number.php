<?php
class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function findDuplicate2($nums) {
        $slow = $slow2 = $fast = 0;
        while (True) {
            $slow = $nums[$slow];
            $fast = $nums[$nums[$fast]];

            if ($slow === $fast) {
                break;
            }
        }

        while (True) {
            $slow = $nums[$slow];
            $slow2 = $nums[$slow2];

            if ($slow === $slow2) {
                break;
            }
        }

        return $slow;
    }

    public function findDuplicate($nums)
    {
        $counts = array_count_values($nums);
        $a = array_flip($counts);
        unset($a[1]);
        return reset($a);
    }
}

$solution = new Solution();
print_r($solution->findDuplicate([3, 1, 4, 2, 2]) . "\n"); // 2
print_r($solution->findDuplicate([1, 3, 4, 2, 2]) . "\n"); // 2
print_r($solution->findDuplicate([3, 1, 3, 4, 2]) . "\n"); // 3
print_r($solution->findDuplicate([1, 1]) . "\n"); // 1
print_r($solution->findDuplicate([1, 1, 2]) . "\n"); // 1
print_r($solution->findDuplicate([2, 2, 2, 2, 2]) . "\n"); // 2
