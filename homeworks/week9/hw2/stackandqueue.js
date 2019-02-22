//push: Add to the end of an Array
//pop: Remove from the end of an Array
//stack: first in,last out
function Stack(){
    let arr = [] 
    return {
        push: function(item){
            arr[arr.length] = item
        },
        pop: function(){
            let result = arr[arr.length-1] //因為是要印出拿掉的值，所以要先宣告
            arr.splice(arr.length-1,1)
            return result
        }
    }
}
var stack = new Stack()
stack.push(10)
stack.push(5)
console.log(stack.pop()) // 5
console.log(stack.pop()) // 10

//queue: first in,first out
function Queue(){
    let arr = [] 
    return {
        push: function(item){
            arr[arr.length] = item
        },
        pop: function(){
            let result = arr[0] //因為是要印出拿掉的值，所以要先宣告
            arr.splice(0,1) //或arr.shift()
            return result
        }
    }
}

var queue = new Queue()
queue.push(1)
queue.push(2)
console.log(queue.pop()) // 1
console.log(queue.pop()) // 2