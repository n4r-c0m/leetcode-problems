<?php
class Solution {

    /**
     * @param Integer[] $students
     * @param Integer[] $sandwiches
     * @return Integer
     */
    function countStudents($students, $sandwiches) {
        while ($sandwiches) {
            if ($sandwiches[0] === $students[0]) {
                array_shift($sandwiches);
                array_shift($students);
                continue;
            }

            $i = array_search($sandwiches[0], $students);
            if ($i === false) {
                return count($students);
            }

            $students = [
                ...array_slice($students, $i),
                ...array_slice($students, 0, $i),
            ];
        }

        return 0;
    }
}

$solution = new Solution();

$students = [1,1,0,0];
$sandwiches = [0,1,0,1];
var_dump($solution->countStudents($students, $sandwiches)); // 0

$students = [1,1,1,0,0,1];
$sandwiches = [1,0,0,0,1,1];
var_dump($solution->countStudents($students, $sandwiches)); // 3