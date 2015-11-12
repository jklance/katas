<?php

require_once dirname(__FILE__) . '/../source/RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase {

    private $_numeral;

    function setUp() {
        $this->_numeral = new RomanNumeral();
    }

    /*
     * Roman to Arabic tests
     */
    function testIReplacements() {
        $this->assertEquals(1, $this->_numeral->romanToArabic('I'));
        $this->assertEquals(2, $this->_numeral->romanToArabic('II'));
        $this->assertEquals(3, $this->_numeral->romanToArabic('III'));
    }

    function testVReplacements() {
        $this->assertEquals(4, $this->_numeral->romanToArabic('IV'));
        $this->assertEquals(5, $this->_numeral->romanToArabic('V'));
        $this->assertEquals(6, $this->_numeral->romanToArabic('VI'));
    }

    function testXReplacements() {
        $this->assertEquals(9, $this->_numeral->romanToArabic('IX'));
        $this->assertEquals(10, $this->_numeral->romanToArabic('X'));
        $this->assertEquals(11, $this->_numeral->romanToArabic('XI'));
        $this->assertEquals(15, $this->_numeral->romanToArabic('XV'));
    }

    function testLReplacements() {
        $this->assertEquals(40, $this->_numeral->romanToArabic('XL'));
    }



    /*
     * Arabic to Roman tests
     */
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

    function testMSubstitutions() {
        $this->assertEquals('CM',  $this->_numeral->arabicToRoman(900));
        $this->assertEquals('M',   $this->_numeral->arabicToRoman(1000));
    }

    function testGivenCases() {
        $this->assertEquals('MLXVI',     $this->_numeral->arabicToRoman(1066));
        $this->assertEquals('MCMLXXXIX', $this->_numeral->arabicToRoman(1989));
    }

    function testInvalidEntries() {
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman(''));
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman('e'));
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman(-150));
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman(0));
    }

}
