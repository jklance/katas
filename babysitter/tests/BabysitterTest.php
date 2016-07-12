<?php

require_once dirname(__FILE__) . '/../src/Babysitter.php';

class BabysitterTest extends PHPUnit_Framework_TestCase {

    private $_babysitter;

    function setUp() {
        $this->_babysitter = new Babysitter();
    }

    function testAcceptsStartTime() {
        $this->assertEquals("6:00PM", $this->_babysitter->setStartTime("6:00PM"));
        $this->assertEquals("1:00AM", $this->_babysitter->setStartTime("1:00AM"));
    }

    function testAcceptsEndTime() {
        $this->assertEquals("4:00AM", $this->_babysitter->setEndTime("4:00AM"));
        $this->assertEquals("11:00PM", $this->_babysitter->setEndTime("11:00PM"));
    }

    function testRejectsBadTime() {
        $this->assertEquals(null, $this->_babysitter->setStartTime("4:00PM"));
        $this->assertEquals(null, $this->_babysitter->setStartTime("5:00AM"));
        $this->assertEquals(null, $this->_babysitter->setEndTime("4:00PM"));
        $this->assertEquals(null, $this->_babysitter->setEndTime("5:00AM"));

        $this->_babysitter->setStartTime("10:00PM");
        $this->assertEquals(null, $this->_babysitter->setEndTime("6:00PM"));
    }

    function testStartTime() {
        $this->_babysitter->setStartTime("3:00PM");
        $this->_babysitter->setEndTime("5:00PM");
        $this->assertEquals("0", $this->_babysitter->calculateCharge());
    }

    function testSingleTimeBandCharges() {
        $this->_babysitter->setStartTime("3:00PM");
        $this->_babysitter->setEndTime("7:00PM");
        $this->assertEquals("24", $this->_babysitter->calculateCharge());
        $this->_babysitter->setStartTime("10:00PM");
        $this->_babysitter->setEndTime("11:00PM");
        $this->assertEquals("8", $this->_babysitter->calculateCharge());
        $this->_babysitter->setStartTime("1:00AM");
        $this->_babysitter->setEndTime("2:00AM");
        $this->assertEquals("16", $this->_babysitter->calculateCharge());
    }

    function testMultipleBandCharge() {
        $this->_babysitter->setStartTime("5:00PM");
        $this->_babysitter->setEndTime("11:00PM");
        $this->assertEquals("68", $this->_babysitter->calculateCharge());
    }

}
