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

 var Numeral = function Constructor() {

     return true;
 };

 module.exports = Numeral;

 Numeral.prototype.convertRoman = function(romanNumeral) {
     var total = 0;
     var substitutionMap = {
         I: 1,
         V: 5,
         X: 10,
         L: 50,
         C: 100,
         D: 500,
         M: 1000
     };

     for (i = 0; i < romanNumeral.length; i++) {
         var characterValue = substitutionMap[romanNumeral[i]];

         if (this._shouldSubtract(romanNumeral[i], romanNumeral[i + 1])) {
             total -= characterValue;
         } else {
             total += characterValue;
         }
     }

     return total;
 };

 Numeral.prototype._shouldSubtract = function(currentNumeral, nextNumeral) {
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
