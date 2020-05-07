<?php
/**
 * Project: LeetCode
 * File: Solution_6_Majority_Element.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 07.05.2020 7:32
 */

namespace src\contest\may2020;

/**
 * Class Solution_6_Majority_Element
 * @package src\contest\may2020
 *
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3321/
 * https://leetcode.com/submissions/detail/335535089/
 */
class Solution_6_Majority_Element
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function majorityElement($nums) {
        $counts = array_flip(array_count_values($nums));
        $n = ceil(count($nums) / 2);
        foreach($counts as $cnt => $num) {
            if ($cnt >= $n) return $num;
        }
        return null;
    }
}