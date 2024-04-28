<?php
#[AllowDynamicProperties]
class TreeNode {
    public $val = null;
    public $left = null;
    public $right = null;
    function __construct($val = 0, $left = null, $right = null) {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }

    public static function fromArray($array) {
        if (empty($array)) {
            return null;
        }

        $root = new TreeNode(array_shift($array));
        $queue = [$root];

        while ($queue) {
            $node = array_shift($queue);
            if (empty($array)) {
                break;
            }

            $leftValue = array_shift($array);
            if ($leftValue !== null) {
                $node->left = new TreeNode($leftValue);
                $queue[] = $node->left;
            }

            if (empty($array)) {
                break;
            }

            $rightValue = array_shift($array);
            if ($rightValue !== null) {
                $node->right = new TreeNode($rightValue);
                $queue[] = $node->right;
            }
        }

        return $root;
    }
}
