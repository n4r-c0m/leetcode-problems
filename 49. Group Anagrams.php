<?php
class Solution {

    /**
     * @param String[] $strs
     * @return String[][]
     */
    function groupAnagrams($strs) {
        $groups = [];
        foreach ($strs as $str) {
            $arr = str_split($str);
            sort($arr);
            $sortedStr = implode('', $arr);
            $groups[$sortedStr][] = $str;
        }

        return $groups;
    }
}

$solution = new Solution();
print_r($solution->groupAnagrams(["eat","tea","tan","ate","nat","bat"]));