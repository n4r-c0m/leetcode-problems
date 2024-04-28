<?php

require_once 'utils/TreeNode.php';

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
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumNumbers($root, $prefix = 0) {
        /** @var TreeNode[] $children */
        $children = [
            ...($root->left ? [$root->left] : []),
            ...($root->right ? [$root->right] : []),
        ];

        if (!$children) {
            return $prefix * 10 + $root->val;
        }

        $result = 0;
        foreach ($children as $child) {
            $result += $this->sumNumbers($child, $prefix * 10 + $root->val);
        }

        return $result;
    }
}

$solution = new Solution();
var_dump($solution->sumNumbers(TreeNode::fromArray([4,9,0,5,1]))); //1026
var_dump($solution->sumNumbers(TreeNode::fromArray([9]))); //9
