<?php
/**
 * Project: leetcode
 * File: Solution_65.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 01.05.2020 17:36
 */

namespace src\solved;

/**
 * Class Solution_65_1
 * @package src\solved
 *
 * https://leetcode.com/problems/valid-number/
 * https://leetcode.com/submissions/detail/333250103/
 *
 *
    * Validate if a given string can be interpreted as a decimal number.
 *
* Some examples:
    * "0" => true
    * " 0.1 " => true
    * "abc" => false
    * "1 a" => false
    * "2e10" => true
    * " -90e3   " => true
    * " 1e" => false
    * "e3" => false
    * " 6e-1" => true
    * " 99e2.5 " => false
    * "53.5e93" => true
    * " --6 " => false
    * "-+3" => false
    * "95a54e53" => false
 *
* Note: It is intended for the problem statement to be ambiguous. You should gather all requirements up front before implementing one. However, here is a list of characters that can be in a valid decimal number:
 *
* Numbers 0-9
    * Exponent - "e"
    * Positive/negative sign - "+"/"-"
    * Decimal point - "."
    * Of course, the context of these characters also matters in the input.
 */
class Solution_65_1
{
    const S_START = 0; //start
    const S_NUM_INT = 1; //integer part
    const S_NUM_FRACT = 2; //fractional part
    const S_NUM_EXP = 3; //order of exponent magnitude
    const S_SIGN = 4; //sign of integer part +|-
    const S_SIGN_EXP = 5; //sign of the order of magnitude
    const S_POINT = 6; //point between integer and fractional part
    const S_POINT_START = 7; //point before number
    const S_EXP = 8; //exponent sign
    const S_SPACE_START = 9; //space before number
    const S_SPACE_END = 10; //space after number
    const S_ERR = 11; //error

    const MAP = [
        self::S_START => [
            '.' => self::S_POINT_START,
            ' ' => self::S_SPACE_START,
            '+' => self::S_SIGN,
            '-' => self::S_SIGN,
            '0' => self::S_NUM_INT,
            '1' => self::S_NUM_INT,
            '2' => self::S_NUM_INT,
            '3' => self::S_NUM_INT,
            '4' => self::S_NUM_INT,
            '5' => self::S_NUM_INT,
            '6' => self::S_NUM_INT,
            '7' => self::S_NUM_INT,
            '8' => self::S_NUM_INT,
            '9' => self::S_NUM_INT,
            '*' => self::S_ERR
        ],
        self::S_SPACE_START => [
            ' ' => self::S_SPACE_START,
            '.' => self::S_POINT_START,
            '-' => self::S_SIGN,
            '+' => self::S_SIGN,
            '0' => self::S_NUM_INT,
            '1' => self::S_NUM_INT,
            '2' => self::S_NUM_INT,
            '3' => self::S_NUM_INT,
            '4' => self::S_NUM_INT,
            '5' => self::S_NUM_INT,
            '6' => self::S_NUM_INT,
            '7' => self::S_NUM_INT,
            '8' => self::S_NUM_INT,
            '9' => self::S_NUM_INT,
            '*' => self::S_ERR
        ],
        self::S_SIGN => [
            '0' => self::S_NUM_INT,
            '1' => self::S_NUM_INT,
            '2' => self::S_NUM_INT,
            '3' => self::S_NUM_INT,
            '4' => self::S_NUM_INT,
            '5' => self::S_NUM_INT,
            '6' => self::S_NUM_INT,
            '7' => self::S_NUM_INT,
            '8' => self::S_NUM_INT,
            '9' => self::S_NUM_INT,
            '.' => self::S_POINT,
            '*' => self::S_ERR
        ],
        self::S_POINT_START => [
            '0' => self::S_NUM_FRACT,
            '1' => self::S_NUM_FRACT,
            '2' => self::S_NUM_FRACT,
            '3' => self::S_NUM_FRACT,
            '4' => self::S_NUM_FRACT,
            '5' => self::S_NUM_FRACT,
            '6' => self::S_NUM_FRACT,
            '7' => self::S_NUM_FRACT,
            '8' => self::S_NUM_FRACT,
            '9' => self::S_NUM_FRACT,
            '*' => self::S_ERR
        ],
        self::S_NUM_INT => [
            '0' => self::S_NUM_INT,
            '1' => self::S_NUM_INT,
            '2' => self::S_NUM_INT,
            '3' => self::S_NUM_INT,
            '4' => self::S_NUM_INT,
            '5' => self::S_NUM_INT,
            '6' => self::S_NUM_INT,
            '7' => self::S_NUM_INT,
            '8' => self::S_NUM_INT,
            '9' => self::S_NUM_INT,
            '.' => self::S_POINT,
            'e' => self::S_EXP,
            ' ' => self::S_SPACE_END,
            '*' => self::S_ERR
        ],
        self::S_POINT => [
            '0' => self::S_NUM_FRACT,
            '1' => self::S_NUM_FRACT,
            '2' => self::S_NUM_FRACT,
            '3' => self::S_NUM_FRACT,
            '4' => self::S_NUM_FRACT,
            '5' => self::S_NUM_FRACT,
            '6' => self::S_NUM_FRACT,
            '7' => self::S_NUM_FRACT,
            '8' => self::S_NUM_FRACT,
            '9' => self::S_NUM_FRACT,
            'e' => self::S_EXP,
            ' ' => self::S_SPACE_END,
            '*' => self::S_ERR
        ],
        self::S_EXP => [
            '0' => self::S_NUM_EXP,
            '1' => self::S_NUM_EXP,
            '2' => self::S_NUM_EXP,
            '3' => self::S_NUM_EXP,
            '4' => self::S_NUM_EXP,
            '5' => self::S_NUM_EXP,
            '6' => self::S_NUM_EXP,
            '7' => self::S_NUM_EXP,
            '8' => self::S_NUM_EXP,
            '9' => self::S_NUM_EXP,
            '+' => self::S_SIGN_EXP,
            '-' => self::S_SIGN_EXP,
            '*' => self::S_ERR
        ],
        self::S_NUM_FRACT => [
            '0' => self::S_NUM_FRACT,
            '1' => self::S_NUM_FRACT,
            '2' => self::S_NUM_FRACT,
            '3' => self::S_NUM_FRACT,
            '4' => self::S_NUM_FRACT,
            '5' => self::S_NUM_FRACT,
            '6' => self::S_NUM_FRACT,
            '7' => self::S_NUM_FRACT,
            '8' => self::S_NUM_FRACT,
            '9' => self::S_NUM_FRACT,
            'e' => self::S_EXP,
            ' ' => self::S_SPACE_END,
            '*' => self::S_ERR
        ],
        self::S_SIGN_EXP => [
            '0' => self::S_NUM_EXP,
            '1' => self::S_NUM_EXP,
            '2' => self::S_NUM_EXP,
            '3' => self::S_NUM_EXP,
            '4' => self::S_NUM_EXP,
            '5' => self::S_NUM_EXP,
            '6' => self::S_NUM_EXP,
            '7' => self::S_NUM_EXP,
            '8' => self::S_NUM_EXP,
            '9' => self::S_NUM_EXP,
            '*' => self::S_ERR
        ],
        self::S_NUM_EXP => [
            '0' => self::S_NUM_EXP,
            '1' => self::S_NUM_EXP,
            '2' => self::S_NUM_EXP,
            '3' => self::S_NUM_EXP,
            '4' => self::S_NUM_EXP,
            '5' => self::S_NUM_EXP,
            '6' => self::S_NUM_EXP,
            '7' => self::S_NUM_EXP,
            '8' => self::S_NUM_EXP,
            '9' => self::S_NUM_EXP,
            ' ' => self::S_SPACE_END,
            '*' => self::S_ERR
        ],
        self::S_SPACE_END => [
            ' ' => self::S_SPACE_END,
            '*' => self::S_ERR,
        ]
    ];

    private $result;

    private $state = self::S_START;

    /**
     * @param String $s
     * @return Boolean
     */
    function isNumber($s) {
        $this->state = static::S_START;
        $len = strlen($s);
        for($i = 0; $i < $len; $i++) {
            if ($this->state === static::S_ERR) {
                break;
            }
            $this->iterate(substr($s, $i, 1));
        }
        return $this->result;
    }

    private function iterate($char)
    {
        if (isset(static::MAP[$this->state][$char])) {
            $this->state = static::MAP[$this->state][$char];
        } else {
            $this->state = static::MAP[$this->state]['*'];
        }
        $this->onStateChange();
    }

    private function onStateChange()
    {
        switch($this->state){
            case static::S_NUM_INT:
            case static::S_NUM_FRACT:
            case static::S_NUM_EXP:
                    $this->result = true;
                break;
            case static::S_ERR:
            case static::S_SIGN:
            case static::S_EXP:
            case static::S_SIGN_EXP:
                $this->result = false;
        }
    }
}