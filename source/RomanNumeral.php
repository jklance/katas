<?php

class RomanNumeral {

    private $_numeral = null;
    private $_result  = null;

    public function arabicToRoman($numeral) {
        $this->_numeral = $numeral;

        $this->_result  = 'I';

        return $this->_result;
    }

}
