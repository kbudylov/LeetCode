<?php
/**
 * Project: LeetCode
 * File: Solution_8_Check_If_Its_A_Straight_Line.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 12.05.2020 16:25
 */

namespace src\contest\may2020;

/**
 * Class Solution_8_Check_If_Its_A_Straight_Line
 * @package src\contest\may2020
 *
 * Check If It Is a Straight Line
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/535/week-2-may-8th-may-14th/3323/
 * https://leetcode.com/submissions/detail/338248150/
 *
 * You are given an array coordinates, coordinates[i] = [x, y], where [x, y] represents the coordinate of a point.
 * Check if these points make a straight line in the XY plane.
 *
 * Constraints:
 * 2 <= coordinates.length <= 1000
 * coordinates[i].length == 2
 * -10^4 <= coordinates[i][0], coordinates[i][1] <= 10^4
 * coordinates contains no duplicate point.
 */
class Solution_8_Check_If_Its_A_Straight_Line
{
    /**
     * @param Integer[][] $coordinates
     * @return Boolean
     */
    function checkStraightLine($coordinates) {
        $p0 = array_shift($coordinates);
        $pMax = array_pop($coordinates);
        $slope0 = $this->slope($p0, $pMax);
        foreach($coordinates as $pN) {
            if ($this->slope($p0, $pN) !== $slope0) {
                return false;
            }
        }
        return true;
    }

    function slope($p1, $p2) {
        if (($p1[0] - $p2[0]) == 0) return 0;
        return (float) ($p2[1] - $p1[1]) / ($p2[0] - $p1[0]);
    }
}