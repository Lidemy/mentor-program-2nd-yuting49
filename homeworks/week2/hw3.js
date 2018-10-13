function isPrime(n) {
    var factors = 0
    for(var i=1; i<=n; i++){
        if (n % i == 0) { factors+=1 } 
    }
    if (factors === 2) { return true }
    if(factors > 2 || factors === 1) {return false}
}

module.exports = isPrime