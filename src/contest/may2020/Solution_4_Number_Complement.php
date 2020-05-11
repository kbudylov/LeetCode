<?php
/**
 * Project: LeetCode
 * File: Solution_4_Number_Complement.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 11.05.2020 12:40
 */

namespace src\contest\may2020;

/**
 * Class Solution_4_Number_Complement
 * @package src\contest\may2020
 *
 * Number Complement
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3319/
 * https://leetcode.com/submissions/detail/337684570/
 *
 * Given a positive integer num, output its complement number.
 * The complement strategy is to flip the bits of its binary representation.
 *
 *
    Example 1:
    Input: num = 5
    Output: 2
    Explanation: The binary representation of 5 is 101 (no leading zero bits), and its complement is 010.
    So you need to output 2.
 *
    Example 2:
    Input: num = 1
    Output: 0
    Explanation: The binary representation of 1 is 1 (no leading zero bits), and its complement is 0.
    So you need to output 0.
 * Constraints:
 * The given integer num is guaranteed to fit within the range of a 32-bit signed integer.
 * num >= 1
 * You could assume no leading zero bit in the integer’s binary representation.
 */
class Solution_4_Number_Complement
{
    /**
     * @param Integer $num
     * @return Integer
     */
    function findComplement($num) {
        return ((1 << floor(log10($num) / log10(2)) + 1) - 1) ^ $num;
    }
}