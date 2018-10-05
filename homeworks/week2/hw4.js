function isPalindromes(str) {
    var reverseStr = reverse(str)
    for (i=0; i<str.length; i++){
        if(str[i]!=reverseStr[i]){
            return false
        }
    }return true
}

function reverse(str) {
    var result = "" 
    for(i=str.length-1; i>=0; i--){
        result = result+str[i]
    }return result
}

module.exports = isPalindromes