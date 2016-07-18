var Coins = require('../lib/coins.js');

describe ("The coins class exists", function() {
    it ("can be instantiated", function() {
        var coin = new Coins();
    });
});

var coin = null; 

beforeEach(function() {
    coin = new Coins();
});

describe ("Can receive coins", function() {
    it ("will receive a quarter if deposited as 'Q'", function() {
        expect(coin.setCoin('Q')).toBe(25);
    });
    it ("will receive a quarter if deposited as 'q'", function() {
        expect(coin.setCoin('q')).toBe(25);
    });
    it ("will receive a quarter if deposited as 'n'", function() {
        expect(coin.setCoin('n')).toBe(5);
    });
    it ("will receive a quarter if deposited as 'd'", function() {
        expect(coin.setCoin('d')).toBe(10);
    });
});

describe ("Can reject coins", function() {
    it ("will reject a penny if deposited as 'p'", function() {
        expect(coin.setCoin('p')).toBe(0);
    });
});

describe ("Can return cash value", function() {
    it ("will return zero if no deposits have been made", function() {
        expect(coin.getCashValue()).toBe(0);
    });
    it ("will return a value if a series of deposits are made", function() {
        coin.setCoin('q');
        coin.setCoin('d');
        coin.setCoin('n');
        expect(coin.getCashValue()).toBe(40);
    });
});




