<?php

require_once dirname(__FILE__) . '/../src/Hours.php';

class HoursTest extends PHPUnit_Framework_TestCase {

    private $_hours;

    function setUp() {
        $this->_hours = new Hours();
    }

    function testAcceptsTime() {
        $this->assertEquals("6:00PM", $this->_hours->setTime("6:00PM"));
        $this->assertEquals("06:00AM", $this->_hours->setTime("06:00AM"));
        $this->assertEquals("12:59PM", $this->_hours->setTime("12:59PM"));
    }

    function testRejectsTime() {
        $this->assertEquals(null, $this->_hours->setTime("blah"));
        $this->assertEquals(null, $this->_hours->setTime("32:00PM"));
        $this->assertEquals(null, $this->_hours->setTime("6:95PM"));
        $this->assertEquals(null, $this->_hours->setTime("6:00TM"));
    }

    function testRetrieveTime() {
        $this->_hours->setTime("6:00PM");
        $this->assertEquals("6:00PM", $this->_hours->getTime());
        $this->assertEquals("6", $this->_hours->getHours());
        $this->assertEquals("00", $this->_hours->getMinutes());
        $this->assertEquals("P", $this->_hours->getMeridian());
    }

    function testClearsTime() {
        $this->_hours->setTime("6:00PM");
        $this->_hours->clearTime();
        $this->assertEquals(null, $this->_hours->getTime());
        $this->assertEquals(null, $this->_hours->getHours());
        $this->assertEquals(null, $this->_hours->getMinutes());
        $this->assertEquals(null, $this->_hours->getMeridian());
    }

    function testSubtractTime() {
        $this->_hours->setTime("6:00PM");
        $this->assertEquals("-4:0", $this->_hours->subtractTime("10:00PM"));
        $this->assertEquals("12:0", $this->_hours->subtractTime("6:00AM"));
        $this->_hours->setTime("6:00AM");
        $this->assertEquals("-12:0", $this->_hours->subtractTime("6:00PM"));
        $this->_hours->setTime("12:00AM");
        $this->assertEquals("2:0", $this->_hours->subtractTime("10:00PM"));
        $this->_hours->setTime("1:00AM");
        $this->assertEquals("1:0", $this->_hours->subtractTime("12:00AM"));
        $this->_hours->setTime("12:00AM");
        $this->assertEquals("-2:0", $this->_hours->subtractTime("2:00AM"));
    }

}
