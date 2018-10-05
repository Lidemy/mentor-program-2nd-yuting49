function stars(n) {
    let result = []
    if(n<=30 && n>0){
        for(i=1; i<=n; i++){
            result.push('*'.repeat(i))
        }return result
    }
}

module.exports = stars;