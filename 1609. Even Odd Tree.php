<?php

class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution {

    /**
     * @param TreeNode $root
     * @return Boolean
     */
    function isEvenOddTree($root) {
        $queue = [];
        $queue[] = [1, $root];

        $currentLevel = null;
        $lastNodeValue = null;

        while ($queue) {
            /** @var TreeNode $node */
            [$level, $node] = array_shift($queue);

            if ($level % 2 === $node->val % 2) {
                return false;
            }

            if ($currentLevel !== $level) {
                $currentLevel = $level;
                $lastNodeValue = $node->val;
                continue;
            }

            if ($level % 2 === 0 && $node->val <= $lastNodeValue) {
                return false;
            }

            if ($level % 2 === 1 && $node->val >= $lastNodeValue) {
                return false;
            }

            $lastNodeValue = $node->val;

            $node->left && $queue[] = [$level + 1, $node->left];
            $node->right && $queue[] = [$level + 1, $node->right];
        }

        return true;
    }
}