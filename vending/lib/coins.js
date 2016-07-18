'use strict';

/* 
    As a vendor
    I want a vending machine that accepts coins
    So that I can collect money from the customer
*/
var Coin = function Constructor() {

    return true;
};

module.exports = Coin;

Coin.prototype.setCoin = function(coin) {
    this._depositedCoin = coin.toUpperCase();

    this._getCoinValue();

    return this._depositValue;
}

Coin.prototype._getCoinValue = function() {
    if (this._depositedCoin) {
        if (this._depositedCoin == 'Q') {
            this._cashValue += .25;
            this._depositValue = .25;
        } else if (this._depositedCoin == 'N') {
            this._cashValue += .05;
            this._depositValue = .05;
        } else if (this._depositedCoin == 'D') {
            this._depositValue = .1;
            this._cashValue += this._depositValue;
        }
    }
};
