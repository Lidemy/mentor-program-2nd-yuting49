//尚未支援連續運算
let inputOne = ""
let inputTwo = ""
let operator = ""

//儲存並顯示欲計算數字
for(let i=0; i<10; i++){
    document.querySelector(".btn"+i).addEventListener("click", ()=>{
        appendResult(i)
    });
}
//判斷 input、按壓運算元、顯示結果或清空
for(let i=10; i<16; i++){
    document.querySelector(".btn"+i).addEventListener("click", ()=>{
        if(inputOne != "" && operator !="" && i==15){
            inputTwo = document.getElementById("result").innerHTML ;
            document.getElementById("result").innerHTML =eval(inputOne+operator+inputTwo)
        }else{
            switch(i){
                case 11:
                operator = "+";
                inputOne = document.getElementById("result").innerHTML ;
                document.getElementById("result").innerHTML ="" ;
                break; 
                case 12:
                operator = "-";
                inputOne = document.getElementById("result").innerHTML ;
                document.getElementById("result").innerHTML ="" ;
                break; 
                case 13:
                operator = "*";
                inputOne = document.getElementById("result").innerHTML ;
                document.getElementById("result").innerHTML ="" ;
                break; 
                case 14:
                operator = "/";
                inputOne = document.getElementById("result").innerHTML ;
                document.getElementById("result").innerHTML ="" ;
                break; 
                case 10:
                document.getElementById("result").innerHTML ="" ;
                break; //清空
            }   
        }
    });
}

function appendResult(str){
    document.getElementById("result").innerHTML += str
}

