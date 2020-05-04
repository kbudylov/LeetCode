<?php
/**
 * Project: LeetCode
 * File: Solution_273_8.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 04.05.2020 10:43
 */

namespace src\favorites;

/**
 * Class Solution_273_8
 * @package src\favorites
 *
 * https://leetcode.com/problems/integer-to-english-words/
 * Sample 8 ms submission
 */
class Solution_273_8
{
    /**
     * @param Integer $num
     * @return String
     */
    function numberToWords($num) {
        $wordOnesMap = [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
        ];
        $wordTensSpecialMap = [
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen'
        ];
        $tens = [
            2 => 'Twenty',
            3 => 'Thirty',
            4 => 'Forty',
            5 => 'Fifty',
            6 => 'Sixty',
            7 => 'Seventy',
            8 => 'Eighty',
            9 => 'Ninety'
        ];
        $kMagns = [
            9 => 'Billion',
            6 => 'Million',
            3 => 'Thousand'
        ];
        $parseK = function($num) use(&$tens, &$wordTensSpecialMap, &$wordOnesMap) {
            $result = '';
            if ($num >= 100) {
                $hundreds = intval($num / 100);
                if (!isset($wordOnesMap[$hundreds])) {
                    print "Can't find {$hundreds} hunders\n";
                }
                $result .= " ". $wordOnesMap[$hundreds] . " Hundred";
            }
            $num = $num % 100;
            if (isset($wordTensSpecialMap[$num])) {
                $result .= " {$wordTensSpecialMap[$num]}";
                $num = 0;
            }
            $digit2 = intval($num / 10);
            if (isset($tens[$digit2])) {
                $result .= " {$tens[$digit2]}";
            } else {
                if ($digit2 > 0) {
                    print "Can't find 2 digit {$digit2}\n";
                }
            }
            $num = $num % 10;
            if (isset($wordOnesMap[$num])) {
                $result .= " {$wordOnesMap[$num]}";
            } else {
                if ($num > 0) {
                    print "Can't find 1st digit {$num}\n";
                }
            }
            return $result;
        };
        $result = '';
        foreach ($kMagns as $kMagn => $magnName) {
            if ($num >= pow(10, $kMagn)) {
                $subMagnValue = intval($num / pow(10, $kMagn));
                $result .= $parseK($subMagnValue);
                if ($magnName) {
                    $result .= " {$magnName}";
                }
                $num = $num % pow(10, $kMagn);
            }
        }
        if ($num > 0) {
            $result .= $parseK($num);
        }
        return $result ? trim($result) : 'Zero';
    }
}