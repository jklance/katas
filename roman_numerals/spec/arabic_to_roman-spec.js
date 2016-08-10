

var Numeral = require("../lib/arabic_to_roman.js");

it("can instantiate the class", function() {
    var numeral = new Numeral();
});

describe("Converts roman to arabic", function() {
    var numeral = new Numeral();

    var expectedSubstitutions = [
        { roman: 'I', arabic: 1 },
        { roman: 'V', arabic: 5 },
        { roman: 'X', arabic: 10 },
        { roman: 'L', arabic: 50 },
        { roman: 'C', arabic: 100 },
        { roman: 'D', arabic: 500 },
        { roman: 'M', arabic: 1000 }
    ]
    describe("Will do a basic substitution", function() {
        expectedSubstitutions.forEach(function(substitution) {
            it("returns " + substitution.arabic + " when supplied with " + substitution.roman, function() {
                expect(numeral.convertRoman(substitution.roman)).toBe(substitution.arabic);
            });
        });
    });

    it("returns 2 when supplied with 'II'", function() {
        expect(numeral.convertRoman('II')).toBe(2);
    });

    describe("Will subtract 'I' ", function() {
        it("from 'V' when supplied with 'IV'", function() {
            expect(numeral.convertRoman('IV')).toBe(4);
        });
        it("from 'X' when supplied with 'IX'", function() {
            expect(numeral.convertRoman('IX')).toBe(9);
        });

    });

    describe("Will subtract 'X' ", function() {
        it("from 'L' when supplied with 'XL'", function() {
            expect(numeral.convertRoman('XL')).toBe(40);
        });
        it("from 'C' when supplied with 'XC'", function() {
            expect(numeral.convertRoman('XC')).toBe(90);
        });
    });

    describe("Will subtract 'C' ", function() {
        it("from 'D' when supplied with 'CD'", function() {
            expect(numeral.convertRoman('CD')).toBe(400);
        });
        it("from 'M' when supplied with 'CM'", function() {
            expect(numeral.convertRoman('CM')).toBe(900);
        });
    });
});

