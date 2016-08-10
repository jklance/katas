var Numeral = require("../lib/roman_to_arabic.js");

it("Can instantiate the class", function() {
    var numeral = new Numeral();
});

describe("Converts roman to arabic:", function() {
    var numeral = new Numeral();

    describe("Will substitute", function() {
        it("1 for I", function() {
            expect(numeral.convertToArabic("I")).toBe(1);
        });
        it("5 for V", function() {
            expect(numeral.convertToArabic("V")).toBe(5);
        });
        it("10 for X", function() {
            expect(numeral.convertToArabic("X")).toBe(10);
        });
        it("50 for L", function() {
            expect(numeral.convertToArabic("L")).toBe(50);
        });
        it("100 for C", function() {
            expect(numeral.convertToArabic("C")).toBe(100);
        });
        it("500 for D", function() {
            expect(numeral.convertToArabic("D")).toBe(500);
        });
        it("1000 for M", function() {
            expect(numeral.convertToArabic("M")).toBe(1000);
        });
    });
});
