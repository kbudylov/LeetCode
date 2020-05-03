<?php
/**
 * Project: mgkh-server
 * File: Solution.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 03.05.2020 2:07
 */

namespace src\contest\may2020;


/**
 * Class Solution
 * @package src\contest\may2020
 *
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3316/
 * https://leetcode.com/submissions/detail/333474271/?from=/explore/challenge/card/may-leetcoding-challenge/534/week-1-may-1st-may-7th/3316/
 *

    You are a product manager and currently leading a team to develop a new product.
    Unfortunately, the latest version of your product fails the quality check.
    Since each version is developed based on the previous version, all the versions after a bad version are also bad.

    Suppose you have n versions [1, 2, ..., n] and you want to find out the first bad one,
    which causes all the following ones to be bad.

    You are given an API bool isBadVersion(version) which will return whether version is bad.
    Implement a function to find the first bad version. You should minimize the number of calls to the API.

    Example:

    Given n = 5, and version = 4 is the first bad version.
    call isBadVersion(3) -> false
    call isBadVersion(5) -> true
    call isBadVersion(4) -> true

    Then 4 is the first bad version.
 *
 */
class Solution_1_Last_Bad_Version {
    /**
     * @param Integer $n
     * @return Integer
     */
    function firstBadVersion($n) {
        $left = 1;
        $right = $n;
        while ($left < $right) {
            $mid = (int) (($left + $right) / 2);
            if ($this->isBadVersion($mid)) {
                $right = $mid;
            } else {
                $left = $mid + 1;
            }
        }
        return $left;
    }

    function isBadVersion($version) {
        if ($version >= 6) return true;
        return false;
    }
}