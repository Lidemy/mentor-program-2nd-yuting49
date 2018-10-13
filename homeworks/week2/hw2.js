/*
var aCode = 'a'.charCodeAt(0)  97
var zCode = 'z'.charCodeAt(0) 122
var ACode = 'A'.charCodeAt(0)  65
var ZCode = 'Z'.charCodeAt(0)  90

console.log(aCode,zCode,ACode,ZCode)
*/
function alphaSwap(str) {
    var result =[]
    for(var i=0; i<str.length; i++){
        if(str.charCodeAt(i) >= 97 && str.charCodeAt(i)<=122){
            result.push(str[i].toUpperCase())
        }else if(str.charCodeAt(i) >= 65 && str.charCodeAt(i)<=90){
            result.push(str[i].toLowerCase())
        }else{
            result.push(str[i])
        }       
    }
    result = result.join('')
    return result
}

module.exports = alphaSwap