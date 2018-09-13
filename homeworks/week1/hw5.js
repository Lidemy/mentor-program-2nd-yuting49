function join(str, concatStr) {
    var temp = ''
    for(i=1; i<=str.length-1; i++){
        temp = temp+concatStr+str[i]
    }
    var result = str[0] + temp
    //console.log(result)
    return result
}
join(["yo","yo","dora","hey"], '!!')
join(["a","b","c"], '!')

function repeat(str, times) {
    result=''
    for(i=1; i>0 && i<=times; i++){
        result = result+str
    }return result
}
//console.log(repeat('yo', 3))
repeat('yo', 3)