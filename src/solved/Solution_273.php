<?php
/**
 * Project: LeetCode
 * File: Solution_273.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 04.05.2020 5:20
 */

namespace src\solved;

/**
 * Class Solution_273
 * @package src\inprocess
 *
 * 273. Integer to English Words
 *
 * https://leetcode.com/problems/integer-to-english-words/
 * https://leetcode.com/submissions/detail/334140644/
 *
 *
 * Convert a non-negative integer to its english words representation.
 * Given input is guaranteed to be less than 231 - 1.


 * Example 1:
    Input: 123
    Output: "One Hundred Twenty Three"

 * Example 2:
    Input: 12345
    Output: "Twelve Thousand Three Hundred Forty Five"

 * Example 3:
    Input: 1234567
    Output: "One Million Two Hundred Thirty Four Thousand Five Hundred Sixty Seven"

 * Example 4:
    Input: 1234567891
    Output: "One Billion Two Hundred Thirty Four Million Five Hundred Sixty Seven Thousand Eight Hundred Ninety One"
 *
 */
class Solution_273
{
    const GROUPS = [
        1 => 'thousand',
        2 => 'million',
        3 => 'billion',
        4 => 'trillion',
        5 => 'quadrillion',
        6 => 'quintrillion',
        7 => 'sextillion',
        8 => 'septillion',
        9 => 'octillion',
        10 => 'nonillion',
        11 => 'decillion'
    ];

    const DIGITS = [
        '0' => 'zero',
        '1' => 'one',
        '2' => 'two',
        '3' => 'three',
        '4' => 'four',
        '5' => 'five',
        '6' => 'six',
        '7' => 'seven',
        '8' => 'eight',
        '9' => 'nine',
        '10' => 'ten',
        '11' => 'eleven',
        '12' => 'twelve',
        '13' => 'thirteen',
        '14' => 'fourteen',
        '15' => 'fifteen',
        '16' => 'sixteen',
        '17' => 'seventeen',
        '18' => 'eighteen',
        '19' => 'nineteen',
        '20' => 'twenty',
        '30' => 'thirty',
        '40' => 'forty',
        '50' => 'fifty',
        '60' => 'sixty',
        '70' => 'seventy',
        '80' => 'eighty',
        '90' => 'ninety'
    ];

    /**
     * @param Integer $num
     * @return String
     */
    function numberToWords($num)
    {
        $integer = (string) $num;
        $output = "";

        if ($integer{0} == "0")
        {
            $output = "zero";
        }
        else
        {
            $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
            $group   = rtrim(chunk_split($integer, 3, " "), " ");
            $groups  = explode(" ", $group);

            $groups2 = array();
            foreach ($groups as $g)
            {
                $groups2[] = $this->convertThreeDigit($g{0}, $g{1}, $g{2});
            }

            for ($z = 0; $z < count($groups2); $z++)
            {
                if ($groups2[$z] != "")
                {
                    $output .= $groups2[$z] . $this->convertGroup(11 - $z) . " ";
                }
            }

            $output = rtrim($output, ", ");
        }

        return ucwords($output);
    }

    function convertGroup($index)
    {
        return isset(static::GROUPS[$index]) ? ' ' . static::GROUPS[$index] : "";
    }

    function convertThreeDigit($digit1, $digit2, $digit3)
    {
        $buffer = "";

        if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
        {
            return "";
        }

        if ($digit1 != "0")
        {
            $buffer .= $this->convertDigit($digit1) . " hundred";
            if ($digit2 != "0" || $digit3 != "0")
            {
                $buffer .= " ";
            }
        }

        if ($digit2 != "0")
        {
            $buffer .= $this->convertTwoDigit($digit2, $digit3);
        }
        else if ($digit3 != "0")
        {
            $buffer .= $this->convertDigit($digit3);
        }

        return $buffer;
    }

    function convertTwoDigit($digit1, $digit2)
    {
        if ($digit2 === "0" || $digit1 === "1") {
            return isset(static::DIGITS[$digit1 . $digit2]) ? static::DIGITS[$digit1 . $digit2] : '';
        } else {
            return static::DIGITS[$digit1 . "0"] . " " . $this->convertDigit($digit2);
        }
    }

    function convertDigit($digit)
    {
        return static::DIGITS[$digit] ?? '';
    }
}