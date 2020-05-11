<?php
/**
 * Project: LeetCode
 * File: Solution_Number_Complement.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 11.05.2020 13:02
 */

namespace src\favorites;

/**
 * Class Solution_Number_Complement
 * @package src\favorites
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
class Solution_Number_Complement
{
    /**
     * @param Integer $num
     * @return Integer
     */
    function findComplement($num) {

        // Get number bit-shifted:
        $num_t = $num;
        $neg1_mask = -1;
        while ($num_t) {
            $num_t = intdiv($num_t, 2);
            $neg1_mask <<= 1;
        }

        // Get the bitwise version of the number, then bitwise OR it with the binary representation of -1
        // shifted by the same amount of bits used to represent the original $num,
        // negate the result, then bitwise AND again with the 32-bit INT MIN number
        // to prevent returning negative numbers in edge case:
        // return ~ $num & ~ (-1 << (intdiv($num, 2) + 1)) & 2147483647;
        return ~($num | $neg1_mask) & 2147483647;
    }
}