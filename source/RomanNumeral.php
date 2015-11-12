<?php

class RomanNumeral {

    private $_numeral = null;
    private $_result  = null;

    public function arabicToRoman($numeral) {
        $this->_numeral = $numeral;
        $this->_result  = null;

        if ($this->_numeral == null) $this->_result = 'Error!';

        while ($this->_numeral > 0) {
            if ($this->_numeral >= 1000) {
                $this->_handleRomanReplacement( 'M', 1000);
            } else if ($this->_numeral >= 900) {
                $this->_handleRomanReplacement('CM', 900);
            } else if ($this->_numeral >= 500) {
                $this->_handleRomanReplacement( 'D', 500);
            } else if ($this->_numeral >= 400) {
                $this->_handleRomanReplacement('CD', 400);
            } else if ($this->_numeral >= 100) {
                $this->_handleRomanReplacement( 'C', 100);
            } else if ($this->_numeral >= 90) {
                $this->_handleRomanReplacement('XC', 90);
            } else if ($this->_numeral >= 50) {
                $this->_handleRomanReplacement( 'L', 50);
            } else if ($this->_numeral >= 40) {
                $this->_handleRomanReplacement('XL', 40);
            } else if ($this->_numeral >= 10) {
                $this->_handleRomanReplacement( 'X', 10);
            } else if ($this->_numeral >= 9) {
                $this->_handleRomanReplacement('IX',  9);
            } else if ($this->_numeral >= 5) {
                $this->_handleRomanReplacement( 'V',  5);
            } else if ($this->_numeral >= 4) {
                $this->_handleRomanReplacement('IV',  4);
            } else {
                $this->_handleRomanReplacement( 'I',  1);
            }
        }

        return $this->_result;
    }

    private function _handleRomanReplacement($character, $increment) {
        $this->_result  .= $character;
        $this->_numeral -= $increment;
    }

}
