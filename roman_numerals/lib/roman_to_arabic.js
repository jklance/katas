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
            returnValue += digitValue;
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
