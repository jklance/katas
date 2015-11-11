<?php

class RomanNumeral {

    private $_numeral = null;
    private $_result  = null;

    public function arabicToRoman($numeral) {
        $this->_numeral = $numeral;
        $this->_result  = null;

        while ($this->_numeral > 0) {
            if ($this->_numeral >= 4) {
                $this->_result  .= 'IV';
                $this->_numeral -= 4;
            } else {
                $this->_result .= 'I';
                $this->_numeral --;
            }
        }

        return $this->_result;
    }

}
