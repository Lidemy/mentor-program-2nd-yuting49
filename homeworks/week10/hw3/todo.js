const todolist = []
const listgroup = document.querySelector(".list-group");

$(document).ready(function() {
    //submit之後
    $('form.form-group').submit(function(e){
        e.preventDefault();
        //取得 item 的值
        var task = document.querySelector('input.addtodo').value
        if(task === ''){
            return
        }else{
            addtodo(task)//新增至todolist []
            render()
            document.querySelector('input.addtodo').value = ''
        }
    })
    $('.todolist').click(function(e){
        const element =$(e.target)
        if(element.hasClass('delete')){
            const temp = element.parent().parent().find('.serial-number').val()
            todolist.splice(temp,1)
            render()
        }
        if(element.hasClass('done')){
            element.parent().parent().css('background','#99FF99')
        }
    })
})

function addtodo(taskname){
    todolist.push(taskname)
}
function render(){
    listgroup.innerHTML ='';
    for(var i = 0; i < todolist.length; i++){
        listgroup.innerHTML +=`
            <li class='list-group-item d-flex justify-content-between'>
                ${todolist[i]}
                <input  name='serial-number' class='serial-number' id='serial-number' value=${i}>
                <div>
                    <button type='button' class='done btn btn-success'>完成</button>
                    <button type='button' class='delete btn btn-danger'>刪除</button>
                </div>
               
            </li>
        `;
    }
}