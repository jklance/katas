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
        expect(coin.setCoin('Q')).toBe(.25);
    });
    it ("will receive a quarter if deposited as 'q'", function() {
        expect(coin.setCoin('q')).toBe(.25);
    });
    it ("will receive a quarter if deposited as 'n'", function() {
        expect(coin.setCoin('n')).toBe(.05);
    });
    it ("will receive a quarter if deposited as 'd'", function() {
        expect(coin.setCoin('d')).toBe(.1);
    });
});
