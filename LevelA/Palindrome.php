<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        $res = $this->str;
        $res = utf8_decode($res);
        $rev = strrev($res);
        $res .= $rev;
        $res = utf8_encode($res);
        
        return $res;
    }

}
