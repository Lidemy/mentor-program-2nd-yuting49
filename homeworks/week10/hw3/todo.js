const todolist = []
const background = []//bgg 為完成綠色、bgn 為未完成無背景
const status = []
const listgroup = document.querySelector(".list-group");

//修改：新增 status、background ，在 addtodo 時新增，在 render、done 時調整

$(document).ready(function() {
    //submit之後
    $('form.form-group').submit(function(e){
        e.preventDefault();
        //取得 item 的值
        var task = document.querySelector('input.addtodo').value
        if(task !== ''){
            addtodo(task)//新增至todolist []
            render()
            document.querySelector('input.addtodo').value = ''
        }
    })
    $('.todolist').click(function(e){
        const element = $(e.target)
        if(element.hasClass('delete')){
            const temp = element.parent().parent().find('.serial-number').val()
            todolist.splice(temp,1)
            background.splice(temp,1)
            status.splice(temp,1)
            render()
        }
        if(element.hasClass('undone')){
            const temp = element.parent().parent().find('.serial-number').val()
            background[temp] = 'bgg'
            status[temp] = 'done'
            render()
        }
        if(element.hasClass('done')){
            const temp = element.parent().parent().find('.serial-number').val()
            background[temp] = 'bgn'
            status[temp] = 'undone'
            render()
        }
    })
})

function addtodo(taskname){
    todolist.push(taskname)
    background.push('bgn')
    status.push('undone')
}
function render(){
    listgroup.innerHTML ='';
    for(var i = 0; i < todolist.length; i++){
        listgroup.innerHTML +=`
            <li class='${background[i]} list-group-item d-flex justify-content-between'>
                ${todolist[i]}
                <input  name='serial-number' class='serial-number' id='serial-number' value=${i}>
                <div>
                    <button type='button' class='${status[i]} btn btn-success'>完成</button>
                    <button type='button' class='delete btn btn-danger'>刪除</button>
                </div>
            </li>
        `;
    }
}