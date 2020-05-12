<?php
/*
 * Project: LeetCode
 * File: Solution_9_Perfect_Square.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 12.05.2020 17:17
 */

namespace src\contest\may2020;

/**
 * Class Solution_9_Perfect_Square
 * @package src\contest\may2020
 *
 * Valid Perfect Square
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/535/week-2-may-8th-may-14th/3324/
 * https://leetcode.com/submissions/detail/338267812/
 *
 * Given a positive integer num, write a function which returns True if num is a perfect square else False.
 * Note: Do not use any built-in library function such as sqrt.
 */
class Solution_9_Perfect_Square
{
    /**
     * @param Integer $num
     * @return Boolean
     */
    function isPerfectSquare($num) {
        $n = $i = 1;
        while($n < $num) {
            if (($n = ++$i * $i) === $num) {
                return true;
            }
        }
        return $num === 1;
    }
}