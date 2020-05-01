<?php
/**
 * Project: LeetCode
 * File: Solution_8.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 01.05.2020 17:55
 */

namespace src\solved;

/**
 *
 * https://leetcode.com/problems/string-to-integer-atoi/

    Implement atoi which converts a string to an integer.

    The function first discards as many whitespace characters as necessary
    until the first non-whitespace character is found.
    Then, starting from this character, takes an optional initial plus or minus sign
    followed by as many numerical digits as possible, and interprets them as a numerical value.

    The string can contain additional characters after those that form the integral number,
    which are ignored and have no effect on the behavior of this function.

    If the first sequence of non-whitespace characters in str is not a valid integral number,
    or if no such sequence exists because either str is empty or it contains only whitespace characters,
    no conversion is performed.
    If no valid conversion could be performed, a zero value is returned.

    Note:

    Only the space character ' ' is considered as whitespace character.
    Assume we are dealing with an environment which could only store integers
    within the 32-bit signed integer range: [−231,  231 − 1].
    If the numerical value is out of the range of representable values,
    INT_MAX (231 − 1) or INT_MIN (−231) is returned.

 * Example 1:
    Input: "42"
    Output: 42

 * Example 2:
    Input: "   -42"
    Output: -42
    Explanation: The first non-whitespace character is '-', which is the minus sign.
    Then take as many numerical digits as possible, which gets 42.

 * Example 3:
    Input: "4193 with words"
    Output: 4193
    Explanation: Conversion stops at digit '3' as the next character is not a numerical digit.

 * Example 4:
    Input: "words and 987"
    Output: 0
    Explanation: The first non-whitespace character is 'w', which is not a numerical
    digit or a +/- sign. Therefore no valid conversion could be performed.

 * Example 5:
    Input: "-91283472332"
    Output: -2147483648
    Explanation: The number "-91283472332" is out of the range of a 32-bit signed integer.
    Therefore INT_MIN (−231) is returned.

 */
class Solution_8 {

    const MAX_INT = 2147483647;
    const MIN_INT = -2147483648;

    const STATE_START = 0;
    const STATE_DIGIT = 1;
    const STATE_SPACE = 2;
    const STATE_SIGN  = 3;
    const STATE_ERR   = 4;
    const STATE_END   = 5;

    private $map = [
        self::STATE_START => [
            '+' => self::STATE_SIGN,
            '-' => self::STATE_SIGN,
            '0' => self::STATE_DIGIT,
            '1' => self::STATE_DIGIT,
            '2' => self::STATE_DIGIT,
            '3' => self::STATE_DIGIT,
            '4' => self::STATE_DIGIT,
            '5' => self::STATE_DIGIT,
            '6' => self::STATE_DIGIT,
            '7' => self::STATE_DIGIT,
            '8' => self::STATE_DIGIT,
            '9' => self::STATE_DIGIT,
            ' ' => self::STATE_SPACE,
            '*' => self::STATE_ERR
        ],
        self::STATE_SIGN => [
            '0' => self::STATE_DIGIT,
            '1' => self::STATE_DIGIT,
            '2' => self::STATE_DIGIT,
            '3' => self::STATE_DIGIT,
            '4' => self::STATE_DIGIT,
            '5' => self::STATE_DIGIT,
            '6' => self::STATE_DIGIT,
            '7' => self::STATE_DIGIT,
            '8' => self::STATE_DIGIT,
            '9' => self::STATE_DIGIT,
            '*' => self::STATE_ERR
        ],
        self::STATE_SPACE => [
            '+' => self::STATE_SIGN,
            '-' => self::STATE_SIGN,
            '0' => self::STATE_DIGIT,
            '1' => self::STATE_DIGIT,
            '2' => self::STATE_DIGIT,
            '3' => self::STATE_DIGIT,
            '4' => self::STATE_DIGIT,
            '5' => self::STATE_DIGIT,
            '6' => self::STATE_DIGIT,
            '7' => self::STATE_DIGIT,
            '8' => self::STATE_DIGIT,
            '9' => self::STATE_DIGIT,
            ' ' => self::STATE_SPACE,
            '*' => self::STATE_ERR
        ],
        self::STATE_DIGIT => [
            '0' => self::STATE_DIGIT,
            '1' => self::STATE_DIGIT,
            '2' => self::STATE_DIGIT,
            '3' => self::STATE_DIGIT,
            '4' => self::STATE_DIGIT,
            '5' => self::STATE_DIGIT,
            '6' => self::STATE_DIGIT,
            '7' => self::STATE_DIGIT,
            '8' => self::STATE_DIGIT,
            '9' => self::STATE_DIGIT,
            '*' => self::STATE_END
        ],
        self::STATE_ERR => [
            '*' => self::STATE_END
        ]
    ];

    private $state = self::STATE_START;

    private $number = '';

    private $isNegative = false;

    /**
     * @param String $str
     * @return Integer
     */
    function myAtoi($str) {
        $i = 0;
        while (isset($str[$i]) && $this->state !== static::STATE_END) {
            $this->iterate($str[$i]);
            $i++;
        }
        return $this->getNumber();
    }


    private function iterate($char)
    {
        if (isset($this->map[$this->state][$char])) {
            $this->state = $this->map[$this->state][$char];
        } else {
            $this->state = $this->map[$this->state]['*'];
        }
        $this->onStateChange($char);
    }

    private function onStateChange($char)
    {
        switch($this->state) {
            case static::STATE_SIGN:
                $this->setSign($char);
                break;
            case static::STATE_DIGIT:
                $this->addDigit($char);
                break;
        }
    }

    private function setSign($char)
    {
        $this->isNegative = $char === '-';
    }

    private function addDigit($d)
    {
        $this->number .= $d;
    }

    private function getNumber()
    {
        $n = (int) $this->number;
        if ($this->isNegative) {
            $n = 0 - $n;
        }

        if ($n > static::MAX_INT) {
            return static::MAX_INT;
        } elseif ($n < static::MIN_INT) {
            return static::MIN_INT;
        }
        return $n;
    }
}