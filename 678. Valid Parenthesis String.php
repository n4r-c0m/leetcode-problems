<?php
class Solution {

    /**
     * @param String $s
     * @return Boolean
     */
    function checkValidString($s) {
        $leftMin = $leftMax = 0;
        $len = strlen($s);

        for ($i = 0; $i < $len; $i++) {
            $leftMin += $s[$i] === '(' ? 1 : -1;
            $leftMax += $s[$i] === ')' ? -1 : 1;

            $leftMin = max(0, $leftMin);

            if ($leftMax < 0) {
                return false;
            }
        }

        return $leftMin == 0;
    }

    function checkValidString2($s) {
        $leftMin = $leftMax = 0;
        for ($i = 0; $i < strlen($s); $i++) {
            $leftMin = max(0, $leftMin + ($s[$i] === '(' ? 1 : -1));

            if (($leftMax += $s[$i] === ')' ? -1 : 1) < 0) {
                return false;
            }
        }

        return $leftMin == 0;
    }
}

$solution = new Solution();
var_dump($solution->checkValidString("((()))()(())(*()()())**(())()()()()((*()*))((*()*)")); // true
var_dump($solution->checkValidString("(((((*(()((((*((**(((()()*)()()()*((((**)())*)*)))))))(())(()))())((*()()(((()((()*(())*(()**)()(())")); // false
var_dump($solution->checkValidString("()")); // true
var_dump($solution->checkValidString("(*)")); // true
var_dump($solution->checkValidString("(*))")); // true
var_dump($solution->checkValidString("(*()")); // true
var_dump($solution->checkValidString(")(*()")); // false
