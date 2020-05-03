<?php
/**
 * Project: leetcode
 * File: Solution_3_Ransom_String.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 03.05.2020 20:26
 */

namespace src\contest\may2020;

/**
 * Class Solution_3_Ransom_Note
 * @package src\contest\may2020
 *
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3318/
 * https://leetcode.com/submissions/detail/333851149/?from=/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3318/
 *
    Given an arbitrary ransom note string and another string containing letters from all the magazines,
    write a function that will return true if the ransom note can be constructed from the magazines ;
    otherwise, it will return false.

    Each letter in the magazine string can only be used once in your ransom note.

    Note:
    You may assume that both strings contain only lowercase letters.
    ```
    canConstruct("a", "b") -> false
    canConstruct("aa", "ab") -> false
    canConstruct("aa", "aab") -> true
    ```
 */
class Solution_3_Ransom_Note
{
    /**
     * @param String $ransomNote
     * @param String $magazine
     * @return Boolean
     */
    function canConstruct($ransomNote, $magazine) {
        $c2 = count_chars($magazine, 1);
        foreach (count_chars($ransomNote, 1) as $chr => $count) {
            if (!isset($c2[$chr]) || $c2[$chr] < $count) {
                return false;
            }
        }
        return true;
    }
}