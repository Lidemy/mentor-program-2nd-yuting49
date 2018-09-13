function reverse(str) {
    var result = "" 
    for(i=str.length-1; i>=0; i--){
        result = result+str[i]
    }console.log(result)
}

reverse('qwert')
reverse('yoyoyo')
reverse('1abc2')