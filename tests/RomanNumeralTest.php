<?php

require_once dirname(__FILE__) . '/../RomanNumeral.php';

class RomanNumeralTest extends PHPUnit_Framework_TestCase {

    function testInitiateClass() {
        $numeral = new RomanNumeral();
    }
}
