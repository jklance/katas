<?php

class RomanNumeral {

    private $_numeral = null;
    private $_result  = null;

    public function arabicToRoman($numeral) {
        $this->_numeral = $numeral;
        $this->_result  = null;

        while ($this->_numeral > 0) {
            if ($this->_numeral >= 10) {
                $this->_handleRomanReplacement('X', 10);
            } else if ($this->_numeral >= 9) {
                $this->_handleRomanReplacement('IX', 9);
            } else if ($this->_numeral >= 5) {
                $this->_handleRomanReplacement('V', 5);
            } else if ($this->_numeral >= 4) {
                $this->_handleRomanReplacement('IV', 4);
            } else {
                $this->_handleRomanReplacement('I', 1);
            }
        }

        return $this->_result;
    }

    private function _handleRomanReplacement($character, $increment) {
        $this->_result  .= $character;
        $this->_numeral -= $increment;
    }

}
