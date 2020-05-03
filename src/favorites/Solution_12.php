<?php
/**
 * Project: LeetCode
 * File: Solution_12.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 04.05.2020 5:10
 */

namespace src\favorites;

/**
 * Class Solution_12
 * @package src\favorites
 *
 * https://leetcode.com/submissions/detail/334022405/
 * Sample 8ms submission
 */
class Solution_12
{
    function intToRoman($num)
    {
        /**
         * @param Integer $num
         * @return String
         */
        function intToRoman($num)
        {
            if (!(3999 >= $num && $num >= 1))
            {
                return 0;
            }

            $arr = [
                3000 => 'MMM',
                2000 => 'MM',
                1000 => 'M',
                900 => 'CM',
                500 => 'D',
                400 => 'CD',
                300 => 'CCC',
                200 => 'CC',
                100 => 'C',
                90 => 'XC',
                50 => 'L',
                40 => 'XL',
                30 => 'XXX',
                20 => 'XX',
                10 => 'X',
                9 => 'IX',
                5 => 'V',
                4 => 'IV',
                3 => 'III',
                2 => 'II',
                1 => 'I'
            ];
            $res = "";
            $idx = 0;

            foreach ($arr as $n => $roman)
            {
                if ($num >= $n)
                {
                    $num -= $n;
                    $res .= $roman;
                    if ($num == 0)
                    {
                        break;
                    }
                }

            }
            return $res;
        }
    }
}
