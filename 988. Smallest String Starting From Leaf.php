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
     * @return String
     */
    function smallestFromLeaf2($root) {
        $queue = [$root];
        $leafs = [];

        while ($queue) {
            $node = array_shift($queue);

            $edges = array_filter([$node->left, $node->right]);
            if (!$edges) {
                $leafs[] = $node;
                continue;
            }

            foreach ($edges as $edge) {
                $edge->parent = $node;
                $queue[] = $edge;
            }
        }

        $results = [];
        while ($leafs) {
            $string = '';
            $node = array_shift($leafs);

            while ($node) {
                $string .= chr(97 + $node->val);
                $node = @$node->parent;
            }

            $results[] = $string;
        }

        return min($results);
    }

    function smallestFromLeaf($root) {
        $this->dfs($root, '');
        return $this->result;
    }

    private $result = '~';
    private function dfs($node, $path)
    {
        if ($node === null) {
            return;
        }

        $path = chr(97 + $node->val) . $path;
        if ($node->left === null && $node->right === null) {
            $this->result = min($this->result, $path);
        }

        $this->dfs($node->left, $path);
        $this->dfs($node->right, $path);
    }
}

$solution = new Solution();
var_dump($solution->smallestFromLeaf(TreeNode::fromArray([0,1,2,3,4,3,4]))); //dba
var_dump($solution->smallestFromLeaf(TreeNode::fromArray([25,1,3,1,3,0,2]))); //adz
var_dump($solution->smallestFromLeaf(TreeNode::fromArray([3,9,20,null,null,15,7]))); //hud