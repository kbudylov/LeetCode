<?php
/**
 * Project: LeetCode
 * File: Solution_10_Find_The_Town_Judge.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 12.05.2020 17:46
 */

namespace src\contest\may2020;

/**
 * Class Solution_10_Find_The_Town_Judge
 * @package src\contest\may2020
 *
 * Find the Town Judge
 * https://leetcode.com/explore/challenge/card/may-leetcoding-challenge/535/week-2-may-8th-may-14th/3325/
 * https://leetcode.com/submissions/detail/338375183/
 *
 *
 * In a town, there are N people labelled from 1 to N.
 * There is a rumor that one of these people is secretly the town judge.
 * If the town judge exists, then:
 *
 * - The town judge trusts nobody.
 * - Everybody (except for the town judge) trusts the town judge.
 * - There is exactly one person that satisfies properties 1 and 2.
 *
 * You are given trust, an array of pairs trust[i] = [a, b] representing
 * that the person labelled a trusts the person labelled b.
 *
 * If the town judge exists and can be identified, return the label of the town judge.
 * Otherwise, return -1.
 *
 * Note:
 *      1 <= N <= 1000
 *      trust.length <= 10000
 *      trust[i] are all different
 *      trust[i][0] != trust[i][1]
 *      1 <= trust[i][0], trust[i][1] <= N
 */
class Solution_10_Find_The_Town_Judge
{
    /**
     * @param Integer $N
     * @param Integer[][] $trust
     * @return Integer
     */
    function findJudge($N, $trust) {
        if ($N > 1) {
            $cnt = count($trust);
            $wtt = [];
            $tto = [];

            for($i = 0; $i < $cnt; $i++) {

                $tto[] = $trust[$i][0];

                !isset($wtt[$trust[$i][1]])
                    ? $wtt[$trust[$i][1]] = 1
                    : ++$wtt[$trust[$i][1]];

            }

            foreach($wtt as $p => $cT) {
                if ($cT === ($N - 1)) {
                    return !in_array($p, $tto) ? $p : -1;
                }
            }
            return -1;
        }
        return 1;
    }
}