<?php

require_once dirname(__FILE__) . '/../source/RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase {

    private $_numeral;

    function setUp() {
        $this->_numeral = new RomanNumeral();
    }

    function testISubstitutions() {
        $this->assertEquals('I',   $this->_numeral->arabicToRoman(1));
        $this->assertEquals('II',  $this->_numeral->arabicToRoman(2));
        $this->assertEquals('III', $this->_numeral->arabicToRoman(3));
    }

    function testVSubstitutions() {
        $this->assertEquals('IV',  $this->_numeral->arabicToRoman(4));
        $this->assertEquals('V',   $this->_numeral->arabicToRoman(5));
        $this->assertEquals('VI',  $this->_numeral->arabicToRoman(6));
    }

    function testXSubstitutions() {
        $this->assertEquals('IX',  $this->_numeral->arabicToRoman(9));
        $this->assertEquals('X',   $this->_numeral->arabicToRoman(10));
        $this->assertEquals('XI',  $this->_numeral->arabicToRoman(11));
    }

    function testLSubstitutions() {
        $this->assertEquals('XL',  $this->_numeral->arabicToRoman(40));
        $this->assertEquals('XLIV',$this->_numeral->arabicToRoman(44));
        $this->assertEquals('L',   $this->_numeral->arabicToRoman(50));
    }

    function testCSubstitutions() {
        $this->assertEquals('XC',  $this->_numeral->arabicToRoman(90));
        $this->assertEquals('C',   $this->_numeral->arabicToRoman(100));
    }

    function testDSubstitutions() {
        $this->assertEquals('CD',  $this->_numeral->arabicToRoman(400));
        $this->assertEquals('D',   $this->_numeral->arabicToRoman(500));
    }

    
}
