function printStars(n) {
    if(n<=30 && n>0){
        for(i=1;i<=n;i++){
            console.log('*')
        }
    }else{
        console.log ("the number should between 1 and 30")
    }
}
printStars(3)
printStars(5)
printStars(45)