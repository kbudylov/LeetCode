<?php
/**
 * Project: mgkh-server
 * File: Solution_7.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 08.05.2020 0:40
 */

namespace src\solved;

/**
 * Class Solution_7
 * @package src\solved
 *
 * https://leetcode.com/problems/reverse-integer/
 * https://leetcode.com/submissions/detail/335874356/
 *
 * 7: Reverse Integer
 *
 * Given a 32-bit signed integer, reverse digits of an integer.


 * Example 1:
    Input: 123
    Output: 321

 * Example 2:
    Input: -123
    Output: -321

 * Example 3:
    Input: 120
    Output: 21

 * Note:
    Assume we are dealing with an environment
    which could only store integers within the 32-bit signed integer range: [−231,  231 − 1].
    For the purpose of this problem, assume that your function returns 0 when the reversed integer overflows.
 */
class Solution_7
{
    /**
     * @param Integer $x
     * @return Integer
     */
    function reverse($x) {
        $rev = 0;
        while ((int)$x != 0) {
            $pop = $x % 10;
            $x /= 10;
            if ($rev >= 2147483647/10 || $rev <= -2147483648 / 10) {
                return 0;
            }
            $rev = $rev * 10 + $pop;
        }
        return $rev;
    }
}