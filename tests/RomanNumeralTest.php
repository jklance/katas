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
        $this->assertEquals(50, $this->_numeral->romanToArabic('L'));
        $this->assertEquals(60, $this->_numeral->romanToArabic('LX'));
        $this->assertEquals(61, $this->_numeral->romanToArabic('LXI'));
    }

    function testCReplacements() {
        $this->assertEquals(90, $this->_numeral->romanToArabic('XC'));
        $this->assertEquals(100, $this->_numeral->romanToArabic('C'));
        $this->assertEquals(112, $this->_numeral->romanToArabic('CXII'));
        $this->assertEquals(155, $this->_numeral->romanToArabic('CLV'));
    }

    function testDReplacements() {
        $this->assertEquals(400, $this->_numeral->romanToArabic('CD'));
        $this->assertEquals(500, $this->_numeral->romanToArabic('D'));
        $this->assertEquals(600, $this->_numeral->romanToArabic('DC'));
        $this->assertEquals(673, $this->_numeral->romanToArabic('DCLXXIII'));
    }

    function testMReplacements() {
        $this->assertEquals(900, $this->_numeral->romanToArabic('CM'));
        $this->assertEquals(1000, $this->_numeral->romanToArabic('M'));
        $this->assertEquals(1100, $this->_numeral->romanToArabic('MC'));
        $this->assertEquals(1573, $this->_numeral->romanToArabic('MDLXXIII'));
    }

    function testGivenFeature2Cases() {
        $this->assertEquals(1066, $this->_numeral->romanToArabic('MLXVI'));
        $this->assertEquals(1989, $this->_numeral->romanToArabic('MCMLXXXIX'));
    }        

    function testInvalidFeature2Entries() {
        $this->assertEquals('Error!', $this->_numeral->romanToArabic(''));
        $this->assertEquals('Error!', $this->_numeral->romanToArabic('MCMF'));
        $this->assertEquals(1066, $this->_numeral->romanToArabic('mlxvi'));
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

    function testGivenFeature1Cases() {
        $this->assertEquals('MLXVI',     $this->_numeral->arabicToRoman(1066));
        $this->assertEquals('MCMLXXXIX', $this->_numeral->arabicToRoman(1989));
    }

    function testInvalidFeature1Entries() {
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman(''));
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman('e'));
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman(-150));
        $this->assertEquals('Error!', $this->_numeral->arabicToRoman(0));
    }

}
