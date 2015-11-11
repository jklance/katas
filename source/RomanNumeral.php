<?php

class RomanNumeral {

    private $_numeral = null;
    private $_result  = null;

    public function arabicToRoman($numeral) {
        $this->_numeral = $numeral;
        $this->_result  = null;

        while ($this->_numeral > 0) {
            $this->_result .= 'I';
            $this->_numeral --;
        }

        return $this->_result;
    }

}
