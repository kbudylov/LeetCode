<?php
/**
 * Project: LeetCode
 * File: Solution_14_Implement_Trie.php
 * Author: Konstantin Budylov <k.budylov@gmail.com>
 * Date: 14.05.2020 13:29
 */

namespace src\contest\may2020;

/**
 * Class Solution_14_Implement_Trie
 * @package src\contest\may2020
 *
 * Implement Trie (Prefix Tree)
 * https://leetcode.com/explore/featured/card/may-leetcoding-challenge/535/week-2-may-8th-may-14th/3329/
 * https://leetcode.com/submissions/detail/339206548/
 *
 * Implement a trie with insert, search, and startsWith methods.
 * Example:
 *
 * Trie trie = new Trie();
 *
 * trie.insert("apple");
 * trie.search("apple");   // returns true
 * trie.search("app");     // returns false
 * trie.startsWith("app"); // returns true
 * trie.insert("app");
 * trie.search("app");     // returns true
 *
 * Note:
 *
 * You may assume that all inputs are consist of lowercase letters a-z.
 * All inputs are guaranteed to be non-empty strings.
 */
class Solution_14_Implement_Trie
{
    private $tree = [];

    /**
     * Initialize your data structure here.
     */
    function __construct() {

    }

    /**
     * Inserts a word into the trie.
     * @param String $word
     * @return NULL
     */
    function insert($word) {
        $node = &$this->tree;
        $len = strlen($word);
        for ($i = 0; $i < $len; $i++) {
            $current = $word[$i];
            if(!isset($node[$current])){
                $node[$current] = [];
            }
            $node = &$node[$current];
        }
        $node[] = false;
    }

    /**
     * Returns if the word is in the trie.
     * @param String $word
     * @return Boolean
     */
    function search($word) {
        $node = $this->findNode($word);
        if (false === $node) {
            return false;
        }
        return in_array(false, $node);
    }

    /**
     * Returns if there is any word in the trie that starts with the given prefix.
     * @param String $prefix
     * @return Boolean
     */
    function startsWith($prefix) {
        $node = $this->findNode($prefix);
        return !empty($node);
    }

    /**
     * @param $word
     * @return array|bool
     */
    private function findNode($word)
    {
        $node = &$this->tree;
        $len = strlen($word);
        for ($i = 0; $i < $len; $i++) {
            $current = $word[$i];
            if (!isset($node[$current])) {
                return false;
            }
            $node = &$node[$current];
        }
        return $node;
    }
}