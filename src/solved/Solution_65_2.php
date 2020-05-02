<?php
/**
 * Project: LeetCode
 * File: Solution_65_2.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 02.05.2020 21:42
 */

namespace src\solved;

/**
 * Class Solution_65_2
 * @package src\solved
 *
 * https://leetcode.com/problems/valid-number/
 * https://leetcode.com/submissions/detail/333261658/
 *
 * Validate if a given string can be interpreted as a decimal number.
 *
 * Some examples:
 * "0" => true
 * " 0.1 " => true
 * "abc" => false
 * "1 a" => false
 * "2e10" => true
 * " -90e3   " => true
 * " 1e" => false
 * "e3" => false
 * " 6e-1" => true
 * " 99e2.5 " => false
 * "53.5e93" => true
 * " --6 " => false
 * "-+3" => false
 * "95a54e53" => false
 *
 * Note: It is intended for the problem statement to be ambiguous. You should gather all requirements up front before implementing one. However, here is a list of characters that can be in a valid decimal number:
 *
 * Numbers 0-9
 * Exponent - "e"
 * Positive/negative sign - "+"/"-"
 * Decimal point - "."
 * Of course, the context of these characters also matters in the input.
 */
class Solution_65_2
{
    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
        return is_numeric(trim($s));
    }
}