<?php
/**
 * Project: LeetCode
 * File: Solution_273.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 04.05.2020 10:36
 */

namespace src\favorites;

/**
 * Class Solution_273_0
 * @package src\favorites
 *
 * https://leetcode.com/problems/integer-to-english-words/
 * Sample 0 ms submission
 */
class Solution_273_0
{
    private $less_then20;
    private $tens;
    private $thousands;

    function __construct() {

        // Initalize reference array
        $this->less_then20 = array("","One","Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen");
        $this->tens = array("", "Ten","Twenty","Thirty","Forty","Fifty","Sixty","Seventy","Eighty","Ninety");
        $this->thousands = array("", " Thousand "," Million ", " Billion ");
    }

    /**
     * @param Integer $num
     * @return String
     */
    function numberToWords($num) {

        if($num == 0)
            return "Zero";

        $result = '';
        $i = 0;

        // Process number in chunks of 3 digits
        while($num > 0) {

            $result = $this->helper($num % 1000).(intval($num%1000) > 0 ? $this->thousands[$i] : "").$result;
            $num = intval($num/1000);
            $i++;
        }

        return trim($result);
    }

    function helper($num) {

        if($num == 0)
            return "";

        else if($num < 20)
            return $this->less_then20[$num];

        else if($num < 100)
            return $this->tens[intval($num/10)].($num%10 > 0 ? " ".$this->helper($num%10) : "");

        else
            return $this->less_then20[intval($num/100)]." Hundred".($num%100 > 0 ? " ".$this->helper($num%100) : "");
    }
}