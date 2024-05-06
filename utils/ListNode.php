<?php

class ListNode
{
    public $val = 0;
    public $next = null;

    function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }

    static public function fromArray($array): ListNode
    {
        $root = new ListNode(array_shift($array));
        $node = $root;
        while (!empty($array)) {
            $node->next = new ListNode(array_shift($array));
            $node = $node->next;
        }
        return $root;
    }
}
