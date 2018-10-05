function add(a, b) {
    //讓兩個數字位數相等
    if (a.length >b.length){
        b = b.padStart(a.length,'0')
    }else{
        a = a.padStart(b.length,'0')
    }      
    //同位數相加
    var ans=[]
    for(i=a.length-1; i>=0; i--){
            ans[i]=Number(a[i])+Number(b[i])
        }
        //處理進位
        for(i=a.length; i>=0; i--){
            if(i!=0){
                if(ans[i]>=10){
                    ans[i]=ans[i]-10
                    ans[i-1]=ans[i-1]+1
            } 
        }    
    }ans=ans.join('')
    return ans
}

module.exports = add;