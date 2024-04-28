<?php

class Solution {
    private $tree;
    private $count;
    private $res;
    private $n;

    function sumOfDistancesInTree($n, $edges) {
        $this->n = $n;
        $this->tree = [];
        $this->count = array_fill(0, $n, 1);
        $this->res = array_fill(0, $n, 0);

        foreach ($edges as $edge) {
            list($u, $v) = $edge;
            $this->tree[$u][] = $v;
            $this->tree[$v][] = $u;
        }

        $this->dfs(0, -1);
        $this->dfs2(0, -1);
        return $this->res;
    }

    private function dfs($node, $parent) {
        foreach ($this->tree[$node] as $neighbor) {
            if ($neighbor == $parent) continue;
            $this->dfs($neighbor, $node);
            $this->count[$node] += $this->count[$neighbor];
            $this->res[$node] += $this->res[$neighbor] + $this->count[$neighbor];
        }
    }

    private function dfs2($node, $parent) {
        foreach ($this->tree[$node] as $neighbor) {
            if ($neighbor == $parent) continue;
            $this->res[$neighbor] = $this->res[$node] - $this->count[$neighbor] + ($this->n - $this->count[$neighbor]);
            $this->dfs2($neighbor, $node);
        }
    }
}

$solution = new Solution();
print_r($solution->sumOfDistancesInTree(6, [[0,1],[0,2],[2,3],[2,4],[2,5]])); // [8,12,6,10,10,10]
