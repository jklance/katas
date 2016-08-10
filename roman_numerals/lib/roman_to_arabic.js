/*
 http://codingdojo.org/cgi-bin/index.pl?KataRomanNumerals

 Numeral Number
 I   1
 V   5
 X   10
 L   50
 C   100
 D   500
 M   1000
 */

"use strict";

var RomanToArabicConverter = function Constructor() {
    return true;
};

module.exports = RomanToArabicConverter;

RomanToArabicConverter.prototype.convertToArabic = function(romanNum) {
    var returnValue = null;
    for (var digit = 0; digit < romanNum.length; digit++) {
        var digitValue =  this._substituteArabicValue(romanNum[digit]);
        if (digitValue) {
            if (romanNum[digit + 1] !== undefined && this._shouldSubtract(romanNum[digit], romanNum[digit + 1])) {
                returnValue -= digitValue;
            } else {
                returnValue += digitValue;
            }
        } else {
            return null;
        }
    }

    return returnValue;
};

RomanToArabicConverter.prototype._substituteArabicValue = function(romanNum) {
    var substitutionMap = {
        "I": 1,
        "V": 5,
        "X": 10,
        "L": 50,
        "C": 100,
        "D": 500,
        "M": 1000
    }

    return substitutionMap[romanNum] || null;
};

RomanToArabicConverter.prototype._shouldSubtract = function(currentNumeral, nextNumeral) {
    var subtractionMap = {
        I: ['V', 'X'],
        X: ['L', 'C'],
        C: ['D', 'M']
    };

    if(subtractionMap[currentNumeral] !== undefined && subtractionMap[currentNumeral].includes(nextNumeral)) {
        return true;
    }

    return false;
};
