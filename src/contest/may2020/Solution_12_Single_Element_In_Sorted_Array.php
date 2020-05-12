<?php
/**
 * Project: LeetCode
 * File: Solution_12_Single_Element_In_Sorted_Array.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 12.05.2020 16:42
 */

namespace src\contest\may2020;

/**
 * Class Solution_12_Single_Element_In_Sorted_Array
 * @package src\contest\may2020
 *
 * Single Element in a Sorted Array
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/535/week-2-may-8th-may-14th/3327/
 * https://leetcode.com/submissions/detail/338248150/
 *
 * You are given a sorted array consisting of only integers where every element appears exactly twice,
 * except for one element which appears exactly once.
 * Find this single element that appears only once.
 */
class Solution_12_Single_Element_In_Sorted_Array
{
    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function singleNonDuplicate($nums) {
        foreach(array_count_values($nums) as $num => $cnt) {
            if ($cnt === 1) return $num;
        }
        return null;
    }
}