<?php
/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */

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
     * @return Integer
     */
    function findBottomLeftValue($root) {
        $maxDepth = 0;
        $maxNode = $root->val;

        $queue = [];
        $queue[] = [1, $root];

        while ($queue) {
            /** @var TreeNode $node */
            [$depth, $node] = array_shift($queue);

            if ($depth >= $maxDepth) {
                $maxDepth = $depth;
                $maxNode = $node->val;
            }

            if ($node->right) {
                $queue[] = [$depth + 1, $node->right];
            }

            if ($node->left) {
                $queue[] = [$depth + 1, $node->left];
            }
        }

        return $maxNode;
    }
}

$solution = new Solution();
//$solution->findBottomLeftValue([2,1,3]);