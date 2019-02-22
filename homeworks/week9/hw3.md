## hw3
在 JavaScript 裡面，一個很重要的概念就是 Event Loop，是 JavaScript 底層在執行程式碼時的運作方式。請你說明以下程式碼會輸出什麼，以及盡可能詳細的解釋原因。
:::info
console.log(1)
setTimeout(() => {
  console.log(2)
}, 0)
console.log(3)
setTimeout(() => {
  console.log(4)
}, 0)
console.log(5)
:::

答：
輸出結果：
:::success
1  
3
5
2
4
:::


原因：
瀏覽器在跑 JavaScript 的時候是 Single Thread（單執行緒），一次只能執行一個任務。所有的任務都需要排隊執行，而若有其中一項任務的執行時間很長，則會造成任務堵塞（可以想像成小七如果只有一個店員在結帳，其中一個客人買了非常多的商品、又要店員煮咖啡、又要繳費、又要影印、又要取貨的時候，就會造成大排長龍）。後來，將任務分成同步與異步兩種，異步會交由 WebAPI 執行，待 WebAPI 有結果後，會先丟到 Task Queue 中等待（註：同步異步這裡沒有很懂）。Event Loop 則是一個不斷反覆檢視 Stack 和 Queue 狀態的機制，當 Stack 為空，就會到 Task Queue 裡取出第一個項目進入 Stack 執行。


執行順序：
| Step| Call Stack | WebAPIs | Callback Queue (Task Queue) | Console |
| ----| -----------| ------- | ---------------------------- |---------|
| 1   | console.log(1)  |  |  | 1 |
| 2   | setTimeout(() => {console.log(2)}, 0) |  |  |  |
| 3   | console.log(3)  | setTimeout(() => {console.log(2)}, 0) |  |3  |
| 4   | setTimeout(() => {console.log(4)}, 0) |  |() => {console.log(2)}  |  |
| 5   | console.log(5)  | setTimeout(() => {console.log(4)}, 0) |() => {console.log(2)} | 5 |
| 6   | () => {console.log(2)} |  | () => {console.log(4)} |  |
| 7   | console.log(2) |  |() => {console.log(4)}  | 2 |
| 8   | () => {console.log(4)} |  |  | |
| 9   | console.log(4)  |  |  | 4 |

說明：
1. console.log(1)放入 Call Stack，執行（印出１，並清空 Stack）
2. 第一個 setTimeout() 放入 Call Stack，執行（將第一個 setTimeout() 交給 WebAPIs，並清空 Stack）
3. console.log(3) 放入Call Stack，執行（印出3，並清空 Stack）；
    WebAPIs 執行第一個 setTimeout()（等待0秒，將匿名函式() => {console.log(2)}放入 Callback Queue）
4. 第二個 setTimeout() 放入 Call Stack，執行（將第二個 setTimeout() 交給 WebAPIs，並清空 Stack）； 
     由於此時 Call Stack 尚未清空，匿名函式() => {console.log(2)}在 Callback Queue 等待中
5. console.log(5) 放入Call Stack，執行（印出5，並清空 Stack）；
    WebAPIs執行 第二個 setTimeout()（等待0秒，將匿名函式() => {console.log(4)}放入 Callback Queue）；
    由於此時 Call Stack 尚未清空，匿名函式() => {console.log(2)}在 Callback Queue 等待中
6. 此時 Stack 為空，從 Callback Queue 取出第一個項目（匿名函式() => {console.log(2)}）放入 Call Stack 並執行（將console.log(2)放入Call Stack）；
    由於此時 Call Stack 尚未清空，匿名函式() => {console.log(4)}在 Callback Queue 等待中
7. 執行console.log(2)（印出2，並清空 Stack）；
    由於此時 Call Stack 尚未清空，匿名函式() => {console.log(4)}在 Callback Queue 等待中
8. 此時 Stack 為空，從 Callback Queue 取出第一個項目（匿名函式() => {console.log(4)}）放入 Call Stack 並執行（將console.log(4)放入Call Stack）
9. 執行console.log(4)（印出4，並清空 Stack）

參考資料：
* [JavaScript 运行机制详解：再谈Event Loop](http://www.ruanyifeng.com/blog/2014/10/event-loop.html)：這一篇也有稍微解釋為什麼 JavaScript 是 Single Thread？
* [[筆記] 理解 JavaScript 中的事件循環、堆疊、佇列和併發模式（Learn event loop, stack, queue, and concurrency mode of JavaScript in depth）](https://pjchender.blogspot.com/2017/08/javascript-learn-event-loop-stack-queue.html)
* [Philip Roberts: Help, I’m stuck in an event-loop.](https://vimeo.com/96425312)