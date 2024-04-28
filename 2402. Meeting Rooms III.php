<?php

class Heap
{
    protected $elements = [];

    public function insert($element)
    {
        $this->elements[] = $element;
        $this->heapifyUp();
    }

    public function extract()
    {
        $result = $this->elements[0];
        $lastElement = array_pop($this->elements);
        if (count($this->elements) > 0) {
            $this->elements[0] = $lastElement;
            $this->heapifyDown();
        }
        return $result;
    }

    public function top()
    {
        return $this->elements[0];
    }

    public function count()
    {
        return count($this->elements);
    }

    protected function heapifyUp()
    {
        $index = count($this->elements) - 1;
        while ($index > 0) {
            $parentIndex = ($index - 1) / 2;
            if ($this->elements[$index] >= $this->elements[$parentIndex]) {
                break;
            }
            $this->swap($index, $parentIndex);
            $index = $parentIndex;
        }
    }

    protected function heapifyDown()
    {
        $index = 0;
        $size = count($this->elements);
        while ($index * 2 + 1 < $size) {
            $leftIndex = $index * 2 + 1;
            $rightIndex = $index * 2 + 2;
            $minIndex = $index;
            if ($leftIndex < $size && $this->elements[$leftIndex] < $this->elements[$minIndex]) {
                $minIndex = $leftIndex;
            }
            if ($rightIndex < $size && $this->elements[$rightIndex] < $this->elements[$minIndex]) {
                $minIndex = $rightIndex;
            }
            if ($minIndex == $index) {
                break;
            }
            $this->swap($index, $minIndex);
            $index = $minIndex;
        }
    }

    protected function swap($i, $j)
    {
        $temp = $this->elements[$i];
        $this->elements[$i] = $this->elements[$j];
        $this->elements[$j] = $temp;
    }

    public function isEmpty()
    {
        return empty($this->elements);
    }
}

class HeapNode
{
    public $endTime;
    public $roomIndex;

    public function construct($endTime, $roomIndex)
    {
        $this->endTime = $endTime;
        $this->roomIndex = $roomIndex;
    }
}

class Solution
{

    /**
     * @param Integer $n
     * @param Integer[][] $meetings
     * @return Integer
     */
    function mostBooked($n, $meetings)
    {
        $currentMeetings = new SplMinHeap();

        $freeRooms = new SplMinHeap();
        for ($i = 0; $i <= $n - 1; $i++) {
            $freeRooms->insert($i);
        }

        $m = [];
        foreach ($meetings as $meeting) {
            $m[$meeting[0]] = $meeting[1];
        }
        ksort($m);

        foreach ($m as $startTime => $endTime) {
            while (!$currentMeetings->isEmpty() && $currentMeetings->top()[0] <= $startTime) {
                $freeRooms->insert($currentMeetings->extract()[1]);
            }

            foreach ($currentMeetings as $currentMeeting) {
                $roomIndex = $currentMeeting[1];
                if ($currentMeeting[0] <= $startTime) {
                    $currentMeeting[0] = -$n + $roomIndex;
                } else {
                    break;
                }
            }

            if (!$freeRooms->isEmpty()) {
                $roomIndex = $freeRooms->extract();
                $m[$startTime] = $roomIndex;
                $currentMeetings->insert([$endTime, $roomIndex]);
                continue;
            }

            [$roomFreeAtTime, $roomIndex] = $currentMeetings->extract();
            $m[$startTime] = $roomIndex;

            if ($roomFreeAtTime <= $startTime) {
                $currentMeetings->insert([$endTime, $roomIndex]);
            }
            $currentMeetings->insert([$endTime + ($roomFreeAtTime - $startTime), $roomIndex]);
        }

        $frequencies = [];

        foreach ($m as $roomIndex) {
            @$frequencies[$roomIndex]++;
        }
        return array_search(max($frequencies), $frequencies);
    }
}

$n = 2;
$meetings = [[0,10],[1,5],[2,7],[3,4]];
$solution = new Solution();
echo $solution->mostBooked($n, $meetings);