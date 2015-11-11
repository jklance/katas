<?php

require_once dirname(__FILE__) . '/../source/RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase {

    private $_numeral;

    function setUp() {
        $this->_numeral = new RomanNumeral();
    }

    function testISubstitutions() {
        $this->assertEquals('I', $this->_numeral->arabicToRoman(1));
        $this->assertEquals('II', $this->_numeral->arabicToRoman(2));
    }
    
}
