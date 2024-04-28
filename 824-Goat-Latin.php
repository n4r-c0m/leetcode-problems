<?php

class Solution {

    /**
     * @param String $sentence
     * @return String
     */
    function toGoatLatin($sentence) {
        $result = '';

        foreach (explode(' ', $sentence) as $index => $word) {
            if ($index > 0) {
                $result .= ' ';
            }
            if (in_array($word[0], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'])) {
                $result .= $word .'ma';
            } else {
                $result .= substr($word, 1) . $word[0] . 'ma';
            }

            $result .= str_repeat('a', $index + 1);
        }

        return $result;
    }
}

$solution = new Solution();

$sentence = "I speak Goat Latin";
var_dump($solution->toGoatLatin($sentence));

$sentence = "The quick brown fox jumped over the lazy dog";
var_dump($solution->toGoatLatin($sentence));

$sentence = "Each word consists of lowercase and uppercase letters only";
var_dump($solution->toGoatLatin($sentence));