var Numeral = require("../lib/roman_to_arabic.js");

it("Can instantiate the class", function() {
    var numeral = new Numeral();
});

describe("Converts roman to arabic:", function() {
    var numeral = new Numeral();

    var expectedSubstitutions = [
        { roman: 'I', arabic: 1 },
        { roman: 'V', arabic: 5 },
        { roman: 'X', arabic: 10 },
        { roman: 'L', arabic: 50 },
        { roman: 'C', arabic: 100 },
        { roman: 'D', arabic: 500 },
        { roman: 'M', arabic: 1000 }
    ];

    describe("Will substitute", function() {
        expectedSubstitutions.forEach( function(substitution) {
            it(substitution.arabic + " for " + substitution.roman, function() {
                expect(numeral.convertToArabic(substitution.roman)).toBe(substitution.arabic);
            });
        });
    });

    describe("Will not substitute for invalid entries", function() {
        it("will return null for invalid entries", function() {
            expect(numeral.convertToArabic('a')).toBeNull();
        });
    });

    describe("Will make multiple substitutions", function() {
        it("will return 2 for II", function() {
            expect(numeral.convertToArabic('II')).toBe(2);
        });
        it("will return 3 for III", function() {
            expect(numeral.convertToArabic('III')).toBe(3);
        });
        it("will return 20 for XX", function() {
            expect(numeral.convertToArabic('XX')).toBe(20);
        });
    });

    describe("Will subtract 'I' ", function() {
        it("from 'V' when supplied with 'IV'", function() {
            expect(numeral.convertToArabic('IV')).toBe(4);
        });
        it("from 'X' when supplied with 'IX'", function() {
            expect(numeral.convertToArabic('IX')).toBe(9);
        });

    });

    describe("Will subtract 'X' ", function() {
        it("from 'L' when supplied with 'XL'", function() {
            expect(numeral.convertToArabic('XL')).toBe(40);
        });
        it("from 'C' when supplied with 'XC'", function() {
            expect(numeral.convertToArabic('XC')).toBe(90);
        });
    });

    describe("Will subtract 'C' ", function() {
        it("from 'D' when supplied with 'CD'", function() {
            expect(numeral.convertToArabic('CD')).toBe(400);
        });
        it("from 'M' when supplied with 'CM'", function() {
            expect(numeral.convertToArabic('CM')).toBe(900);
        });
    });
});
