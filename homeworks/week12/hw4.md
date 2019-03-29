# 1. 為什麼我們需要 React？可以不用嗎？
- 當資料異動頻繁，或 UI 介面複雜、重複性高時，透過使用 React，實作上會較為方便。
- 不用也可以，只是要自己操作 DOM 比較麻煩、容易出錯。

# 2. React 的思考模式跟以前的思考模式有什麼不一樣？
- React 以 Component 為核心，而 Component 若需彼此溝通，需有上下層關係。
- React 由 state 決定畫面，當需要變動時，會改變 state，進而改變 Virtual DOM，再由 React 比對後改變DOM。而不是直接操作 DOM。

# 3. state 跟 props 的差別在哪裡？
- state 是 Component 自己內部的狀態，可以透過 setState 改變。state 是 Component 底下的物件。
- props 是 繼承上層 Component 的，無法自行改變。 props 是 Component 間彼此溝通的要角，像是參數。

# 4. 請列出 React 的 lifecycle 以及其代表的意義
## Mounting：當 Component 的 instance 建立、放入 DOM 的時候。在這個階段，會依序執行下列的 function。
- constructor()
- getDerivedStateFromProps() 
- render() 
- component­Did­Mount() 
## Updating：當 props 或 state 改變時。在這個階段，會依序執行下列的 function。
- static getDerivedStateFromProps()
- shouldComponentUpdate()
- render()
- getSnapshotBeforeUpdate()
- componentDidUpdate()
## Unmounting：當 Component 要從 DOM 移除的時候。在這個階段，會依序執行下列的 function。
- componentWillUnmount()
