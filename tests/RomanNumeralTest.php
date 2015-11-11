<?php

require_once dirname(__FILE__) . '/../source/RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase {

    function testInitiateClass() {
        $numeral = new RomanNumeral();
    }
}
