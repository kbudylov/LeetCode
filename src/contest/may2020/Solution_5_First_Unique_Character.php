<?php
/**
 * Project: LeetCode
 * File: Solution_5_First_Unique_Character.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 05.05.2020 17:01
 */

namespace src\contest\may2020;

/**
 * Class Solution_5_First_Unique_Character
 * @package src\contest\may2020
 *
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3320/
 * https://leetcode.com/submissions/detail/334753526/
 */
class Solution_5_First_Unique_Character
{
    /**
     * @param String $s
     * @return Integer
     */
    function firstUniqChar($s) {
        $len = strlen($s);
        $cntChars = count_chars($s, 1);
        for($i = 0; $i < $len; $i++) {
            if ($cntChars[ord($s[$i])] === 1) {
                return $i;
            }
        }
        return -1;
    }
}