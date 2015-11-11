<?php

require_once dirname(__FILE__) . '/../source/RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase {

    private $numeral;

    function setUp() {
        $this->_numeral = new RomanNumeral();
    }

    function testISubstitutions() {
        $this->assertEquals('I', $this->numeral->arabicToRoman(1));
    }
    
}
