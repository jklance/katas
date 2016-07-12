<?php

/* babysitter kata: https://gist.github.com/jameskbride/5482722

 The babysitter 
 - starts no earlier than 5:00PM
 - leaves no later than 4:00AM
 - gets paid $12/hour from start-time to bedtime
 - gets paid $8/hour from bedtime to midnight
 - gets paid $16/hour from midnight to end of job
 - gets paid for full hours (no fractional hours)


 Feature:
 As a babysitter
 In order to get paid for 1 night of work
 I want to calculate my nightly charge
*/

require_once 'Hours.php';

class Babysitter {
    const START_BOUNDARY    = "5:00PM";
    const END_BOUNDARY      = "4:00AM";
    const BEDTIME           = "10:00PM";
    const MIDNIGHT          = "12:00AM";
    const WAGE_PREBED       = 12;
    const WAGE_PREMIDNIGHT  = 8;
    const WAGE_POSTMIDNIGHT = 16;

    private $_startTime;
    private $_endTime;

    private $_startBoundary;
    private $_endBoundary;

    private $_charge;


    function __construct($start = null, $end = null) {
        $this->_startBoundary = new Hours(self::START_BOUNDARY);
        $this->_endBoundary   = new Hours(self::END_BOUNDARY);
        $this->_bedtime       = new Hours(self::BEDTIME);
        $this->_midnight      = new Hours(self::MIDNIGHT);
        
        $this->_startTime = new Hours();
        $this->_endTime   = new Hours();
        $this->_charge    = null;

    }

    function setStartTime($time) {
        $this->_startTime->setTime($time);

        if ($this->_isValidTime($this->_startTime)) {
            return $this->_startTime->getTime();
        }
        return null;
    }

    function setEndTime($time) {
        $this->_endTime->setTime($time);

        if ($this->_isValidTime($this->_endTime)) {
            return $this->_endTime->getTime();
        }
        return null;
    }

    function getStartTime() {
        return $this->_startTime->getTime();
    }

    function getEndTime() {
        return $this->_endTime->getTime();
    }

    function calculateCharge() {
        if (!$this->_startTime->getTime() || !$this->_endTime->getTime()) {
            return 0;
        }

        $hoursPreBed  = $this->_getHours($this->_startBoundary, $this->_bedtime);
        $hoursPreMid  = $this->_getHours($this->_bedtime, $this->_midnight);
        $hoursPostMid = $this->_getHours($this->_midnight, $this->_endBoundary);


        $charge = 0;
        $charge += $this->_calculateCharge($hoursPreBed, self::WAGE_PREBED);
        $charge += $this->_calculateCharge($hoursPreMid, self::WAGE_PREMIDNIGHT);
        $charge += $this->_calculateCharge($hoursPostMid, self::WAGE_POSTMIDNIGHT);

        return $charge;
    }

    private function _isValidTime($time) {
        $morningDiff = $time->subtractTime($this->_startBoundary->getTime());
        $eveningDiff = $this->_endBoundary->subtractTime($time->getTime());
        $enteredDiff = $this->_endTime->subtractTime($this->_startTime->getTime());

        if ($time && $time->getTime() && 
            (substr($morningDiff, 0, 1) != '-' || substr($eveningDiff, 0, 1) != '-') &&
            (substr($enteredDiff, 0, 1) != '-')) {
                return true;
        }

        return false;
    }

    private function _getHours($sBound, $eBound) {
        $start = $this->_startTime;
        $end   = $this->_endTime;

        /* Check to see if sitting time overlaps the bounds at all */
        $startingDiff = $sBound->subtractTime($end->getTime());
        $endingDiff   = $eBound->subtractTime($start->getTime());

        if (substr($startingDiff, 0, 1) != '-' || substr($endingDiff, 0, 1) == '-') {
            return 0;
        }

        /* Check to see which parts of the sitting time is within the bounds */
        $startingDiff = $sBound->subtractTime($start->getTime());
        $endingDiff   = $eBound->subtractTime($end->getTime());

        if (substr($startingDiff, 0, 1) != '-') {
            $start = $sBound;
        }
        if (substr($endingDiff, 0, 1) == '-') {
            $end = $eBound;
        }

        $hours = $end->subtractTime($start->getTime());

        if (substr($hours, 0, 1) != '-') {
            return explode(':', $hours)[0];
        }

        return 0;
    }


    private function _calculateCharge($hours, $wage) {
        $charge = $hours * $wage;

        return $charge;
    }

}
