/*  0.使用者點擊送出鍵
    a.確認必填題是否填答    
狀況 未完整填答：送出表單時，必填的地方如果空白，要能夠把背景變紅色並且提示使用者
    b.若有部分必填題的值為空，將 input 值為空的 block 變更背景色
    c.在未填答的必填題下方，跳出提示語
    d.未做：使用者輸入未答必填題後，移除背景色及提示語。改成toggle?
狀況 完整填答：文字輸入框可以選擇必填或是非必填(非必填選項沒填也可以送出表單)
    b.必填題皆有值，跳出 alert ，恭喜提交成功
    c.將 input 的值印出在 console        */
    
var reminder = document.querySelectorAll("div.remind")
var questions = document.querySelectorAll("div.mustAns")
var answer = document.querySelectorAll("input.answer")

function submit(){
    var result = 0
    //確認必選題
    var x = document.getElementById("pro").checked
    var y = document.getElementById("fun").checked
    if(x+y == 0){
        questions[2].style.background = "#FFE4E1";
        reminder[2].style.display = "block"; 
        result += 1
    }
    //確認必填題
    for(var i=0; i<4; i++){
        if(answer[i].value == ""){
            questions[i].style.background = "#FFE4E1";
            reminder[i].style.display = "block"; 
            result += 1
        }
    } 
    //確認所有值已填
    if(result == 0){
        console.log("電子郵件：",answer[0].value)
        console.log("暱稱：",answer[1].value)
        console.log("報名類型：","工程師培養班：",x,"業餘班：",y)
        console.log("程式背景：",answer[3].value)
        console.log("其他：",answer[4].value)
        alert("提交成功")
    }      
}
