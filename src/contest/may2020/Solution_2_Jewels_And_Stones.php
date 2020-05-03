<?php
/**
 * Project: leetcode
 * File: Solution_2_Jewels_And_Stones.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 03.05.2020 6:44
 */

namespace src\contest\may2020;

/**
 * Class Solution_2_Jewels_And_Stones
 * @package src\contest\may2020
 *
 *  https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3317/

    You're given strings J representing the types of stones that are jewels,
    and S representing the stones you have.
    Each character in S is a type of stone you have.
    You want to know how many of the stones you have are also jewels.

    The letters in J are guaranteed distinct, and all characters in J and S are letters.
    Letters are case sensitive, so "a" is considered a different type of stone from "A".

    Example 1:
    Input: J = "aA", S = "aAAbbbb"
    Output: 3

    Example 2:
    Input: J = "z", S = "ZZ"
    Output: 0
    Note:

    S and J will consist of letters and have length at most 50.
    The characters in J are distinct.
 */
class Solution_2_Jewels_And_Stones
{
    /**
     * @param String $J
     * @param String $S
     * @return Integer
     */
    function numJewelsInStones($J, $S) {
        $num_J = 0;
        $i = 0;
        while(isset($S[$i])) {
            $j = 0;
            while (isset($J[$j])) {
                if ($S[$i] === $J[$j]) {
                    $num_J++;
                }
                $j++;
            }
            $i++;
        }
        return $num_J;
    }
}