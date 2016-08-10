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
    });
});
