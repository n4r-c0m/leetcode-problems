<?php

class Solution {

    /**
     * @param String $version1
     * @param String $version2
     * @return Integer
     */
    function compareVersion($version1, $version2) {
        $v1 = explode('.', $version1);
        $v2 = explode('.', $version2);

        $count = max(count($v1), count($v2));
        for ($i = 0; $i < $count; $i++) {
            $v1rev = @(int)$v1[$i] ?? 0;
            $v2rev = @(int)$v2[$i] ?? 0;

            if ($v1rev === $v2rev) {
                continue;
            }

            return $v1rev > $v2rev ? 1 : -1;
        }

        return 0;
    }
}

$solution = new Solution();
var_dump($solution->compareVersion("1.01.2", "1.001")); // 1
var_dump($solution->compareVersion("1.01", "1.001")); // 0
var_dump($solution->compareVersion("1.0", "1.0.0")); // 0
var_dump($solution->compareVersion("0.1", "1.1")); // -1