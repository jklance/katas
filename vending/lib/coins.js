'use strict';

/* 
    As a vendor
    I want a vending machine that accepts coins
    So that I can collect money from the customer
*/
var Coin = function Constructor() {
    this._depositedCoin = null;
    this._depostValue   = null;
    this._cashValue     = 0;

    return true;
};

module.exports = Coin;

Coin.prototype.setCoin = function(coin) {
    this._depositedCoin = coin.toUpperCase();

    this._getCoinValue();

    return this._depositValue;
}

Coin.prototype.getCashValue = function() {
    return this._cashValue;
};

Coin.prototype._getCoinValue = function() {
    if (this._depositedCoin) {
        if (this._depositedCoin == 'Q') {
            this._depositValue = 25;
        } else if (this._depositedCoin == 'N') {
            this._depositValue = 5;
        } else if (this._depositedCoin == 'D') {
            this._depositValue = 10;
        } else {
            this._depositValue = 0;
        }
        
        this._cashValue += this._depositValue;
    }
};
