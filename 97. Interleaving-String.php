<?php
class Solution {

    protected $s1;
    protected $s2;
    protected $s3;

    /**
     * @param String $s1
     * @param String $s2
     * @param String $s3
     * @return Boolean
     */
    function isInterleave($s1, $s2, $s3) {
        if (strlen($s1) + strlen($s2) !== strlen($s3)) return false;

        $this->s1 = $s1;
        $this->s2 = $s2;
        $this->s3 = $s3;

        return $this->evaluate(0, 0, 0);
    }

    protected function evaluate($pos1, $pos2, $pos3)
    {
        static $cache = [];

        if (isset($cache[$pos1][$pos2][$pos3])) {
            return $cache[$pos1][$pos2][$pos3];
        }

        for ($index = $pos3, $length = strlen($this->s3); $index < $length; $index++) {
            if ($this->s3[$index] === @$this->s1[$pos1] && $this->s3[$index] === @$this->s2[$pos2]) {
                return $this->evaluate(
                        $pos1 + 1,
                        $pos2,
                    $index + 1)

                    || $this->evaluate(
                        $pos1,
                        $pos2 + 1,
                        $index + 1
                    );
            }

            if ($this->s3[$index] === @$this->s1[$pos1]) {
                $pos1++;
                continue;
            }

            if ($this->s3[$index] === @$this->s2[$pos2]) {
                $pos2++;
                continue;
            }

            return $cache[$pos1][$pos2][$pos3] = false;
        }

        return $cache[$pos1][$pos2][$pos3] = true;
    }
}

$solution = new Solution();

$s1 =
    "aabcc";
$s2 =
    "dbbca";
$s3 =
    "aadbbcbcac";

//var_dump($solution->isInterleave($s1, $s2, $s3)); // true

$s1 = "bbbbbabbbbabaababaaaabbababbaaabbabbaaabaaaaababbbababbbbbabbbbababbabaabababbbaabababababbbaaababaa";
$s2 = "babaaaabbababbbabbbbaabaabbaabbbbaabaaabaababaaaabaaabbaaabaaaabaabaabbbbbbbbbbbabaaabbababbabbabaab";
$s3 = "babbbabbbaaabbababbbbababaabbabaabaaabbbbabbbaaabbbaaaaabbbbaabbaaabababbaaaaaabababbababaababbababbbababbbbaaaabaabbabbaaaaabbabbaaaabbbaabaaabaababaababbaaabbbbbabbbbaabbabaabbbbabaaabbababbabbabbab";

var_dump($solution->isInterleave($s1, $s2, $s3)); // true