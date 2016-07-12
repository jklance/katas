<?php

class Hours {
    private $_time;
    private $_hours;
    private $_minutes;
    private $_meridian;

    function __construct($time = null) {
        $this->clearTime();

        $this->_validateAndSetTime($time);

    }

    function setTime($time) {
        $this->_validateAndSetTime($time);

        return $this->_time;
    }

    function getTime() {
        return $this->_time;
    }

    function getHours() {
        return $this->_hours;
    }

    function getMinutes() {
        return $this->_minutes;
    }

    function getMeridian() {
        return $this->_meridian;
    }

    function clearTime() {
        $this->_time     = null;
        $this->_hours    = null;
        $this->_minutes  = null;
        $this->_meridian = null;
    }

    function subtractTime($time) {
        $difference = null;

        if ($this->_time && preg_match("/^([0-1]?[0-9]):([0-5][0-9])(A|P)M$/", $time, $matches)) {
            $timeHours    = $matches[1];
            $timeMinutes  = $matches[2];
            $timeMeridian = strtoupper($matches[3]);

            $hDiff = $this->_hours - $timeHours;
            $mDiff = $this->_minutes - $timeMinutes;

            if ($timeMeridian == "A" && $this->_meridian == "P") {
                $hDiff += 12;
            } else if ($timeMeridian == "P" && $this->_meridian == "A" && $this->_hours != "12") {
                $hDiff -= 12;
            } else if ($timeMeridian == "A" && $this->_meridian == "A" && $timeHours == "12") {
                $hDiff += 12;
            } else if ($timeMeridian == "A" && $this->_meridian == "A" && $this->_hours == "12") {
                $hDiff -= 12;
            }
            
            $difference = $hDiff . ":" . $mDiff;
        }

        return $difference;
        
    }

    private function _validateAndSetTime($time) {
        if (preg_match("/^([0-1]?[0-9]):([0-5][0-9])(A|P)M$/", $time, $matches)) {
            $this->_time     = $time;
            $this->_hours    = $matches[1];
            $this->_minutes  = $matches[2];
            $this->_meridian = strtoupper($matches[3]);
        }
    }

}
