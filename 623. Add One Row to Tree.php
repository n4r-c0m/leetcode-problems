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
     * @param Integer $val
     * @param Integer $depth
     * @return TreeNode
     */
    function addOneRow($root, $val, $depth) {
        if ($depth === 1) {
            $root = new TreeNode($val, $root);
        } elseif ($depth > 2) {
            if ($root->left) $this->addOneRow($root->left, $val, $depth - 1);
            if ($root->right) $this->addOneRow($root->right, $val, $depth - 1);
        } else {
            $root->left = new TreeNode($val, $root->left);
            $root->right = new TreeNode($val, null, $root->right);
        }

        return $root;
    }
}

$solution = new Solution();
var_dump($solution->addOneRow(TreeNode::fromArray([4,2,6,3,1,5]), 1, 2)); // [4,1,1,2,null,null,6,3,1,5]
var_dump($solution->addOneRow(TreeNode::fromArray([4,2,null,3,1]), 1, 3)); // [4,2,null,1,1,3,null,null,1]