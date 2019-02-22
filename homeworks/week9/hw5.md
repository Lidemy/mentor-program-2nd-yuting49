## CSS 預處理器是什麼？我們可以不用它嗎？
CSS 預處理器是什麼？
CSS 預處理器是讓我們能用程式化的方法寫 CSS 語法的工具，語法和 CSS 很類似，但不完全相同（除了 Scss 以外）。並透過預處理器將內容轉譯為 CSS。常見的 CSS 預處理器為：Scss/Sass、Less、Stylus，這些預處理器提供 CSS 沒有的功能，包括：可以使用變數(Variable)、繼承(Extend)、函式 (Function)、混用(Mixin)、提供數學運算與文件切分以利模組化等等，讓讀寫 CSS 更方便也更容易維護。

當專案規模愈大，純 CSS 的可讀性就會下降，要在幾百幾千行裡找出要更改的那一行會耗費開發者很多時間，而使用 CSS Preprocessor 則可以有效幫助我們解決這樣的問題。

我們可以不用 CSS Preprocessor 嗎？
可以，就像我們也可以不用 jQuery 或 Bootstrap 一樣。原生的 CSS 還是能做出一樣的功能，只是當專案規模變大的時候，在維護上會比較麻煩。而使用 CSS Preprocessor 則可以減少我們撰寫 CSS 規則和修改的時間，並提升可讀性。

參考資料：
* [10 Reasons to Use a CSS Preprocessor in 2018](https://raygun.com/blog/10-reasons-css-preprocessor/)
* [Do you Really Need the Preprocessor? Use CSS Variables Instead](https://codeburst.io/do-you-really-need-the-preprocessor-use-css-variables-instead-582dacad4b8c)
* [Sass/SCSS 簡明入門教學](https://blog.techbridge.cc/2017/06/30/sass-scss-tutorial-introduction/)
* [浅谈 CSS 预处理器：为什么要使用预处理器？](https://github.com/cssmagic/blog/issues/73)
* [浅谈css预处理器，Sass、Less和Stylus](https://zhuanlan.zhihu.com/p/23382462)

## 請舉出任何一個跟 HTTP Cache 有關的 Header 並說明其作用。
* Expires: Wed, 5 Mar 2018 11:00:00 GMT
    * 使用方式為 Expires: date (日期格式必須符合 RFC1123)，用法為設定一個確切的日期，當 client 端時間小於 response header(Expires) 時間時，則會使用 cache。由於 client 端的日期是跟隨作業系統的時間，因此可能因為使用者的設定不同，而不如預期。
* Cache-Control: max-age=600
    * max-age 代表 response 過期時間，以秒數計，600 為 10 分鐘，如果使用者在收到 response 10 分鐘內重新整理，則會從 cache 中取資料，而不會發送 request；超過 10 分鐘後，則會發出新的 request。
* Cache-Control: no-store
    * 代表完全不使用 cache，每次都發送新的 request。注意和 no-cache 的差異。
* Cache-Control: no-cache
    * 發 request 與 server 確認是否有內容的更動，若 server 回傳 304(Not Modified)則使用 cache。 反之，則拿取新內容。

* 參考資料：
    * [循序漸進理解 HTTP Cache 機制](https://blog.techbridge.cc/2017/06/17/cache-introduction/)
    * [HTTP 快取](https://developers.google.com/web/fundamentals/performance/optimizing-content-efficiency/http-caching?hl=zh-tw)
    * [MDN：Cache-Control](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control)
    * [[http] http header， Cache-Control, Expires 用法說明](https://blog.camel2243.com/2018/09/23/http-http-header，-cache-control-expires-用法說明/)

## Stack 跟 Queue 的差別是什麼？
Stack 和 Queue 都是一種線性的資料結構，差別在於前者是後進先出，後者是先進先出。Stack 就像拿餐盤一樣，我們會從最上面的拿起，要放的時候也會放在最上面。Queue 則像單一窗口的排隊，先排隊的先執行（結帳或其他），晚到的人則排在隊伍尾端。

Stack：台譯堆疊，中譯棧，後進先出 (LIFO, Last In, First Out)
Queue：台譯佇列，中譯隊列，先進先出 (FIFO, First In, First Out)

## 請去查詢資料並解釋 CSS Selector 的權重是如何計算的（不要複製貼上，請自己思考過一遍再自己寫出來）
整理：
!important > inline style > ID > Class/Pseudo-class(偽類)/Attribute（屬性選擇器） > Element/Pseudo-elements > *（全站預設）

全站預設值（ * ）計為：0-0-0-0
任一 Element、Pseudo-element 計為：0-0-0-1
任一 Class、Pseudo-class、Attribute 計為：0-0-1-0
任一 ID 計為：0-1-0-0
任一 inline style 計為：1-0-0-0
另有例外情形：!important，計為：1-0-0-0-0 (蓋過以上所有權重)

說明：
以撲克牌比喻的話，以橋牌的規則較類似，最常見的四類 inline style、ID、Class、Element 他們分別對應四種花色，inline style 是黑桃、ID 是紅心、Class 是方塊、Element 是梅花。先比**有無花色**再比**數字大小**，就是 CSS Selector 權重計算的規則。通常會以 0-0-0-0 四個層級來計算。

補充：
* 若權重相同，則後寫的會覆蓋先寫的。
* Pseudo-element 和 Element 為同一層級。Pseudo-class、Attribute 和 Class 均為同一層級。
* element：就是 html 的 element，例如：div, p, ul, ol, li
* Pseudo-elements：前面用兩個冒號的偽元素，::before、::after、::first-line、::first-letter。和::selection。[參考](https://www.oxxostudio.tw/articles/201706/pseudo-element-1.html)
* Pseudo-class：常見的有:hover、:first()、:nth-child()。[參考](https://developer.mozilla.org/zh-TW/docs/Web/CSS/Pseudo-classes)
* attribute：屬性選擇器。[參考](https://pjchender.github.io/2018/07/17/css-屬性選擇器-（css-attribute-selector）/)

參考資料：
* [Day20：小事之 CSS 權重 (css specificity)](https://ithelp.ithome.com.tw/articles/10196454)
* [CSS Specificity: Things You Should Know](https://www.smashingmagazine.com/2007/07/css-specificity-things-you-should-know/)
* [Specificity Calculator](https://specificity.keegan.st)
* [強烈推薦收藏好物 – CSS Specificity (CSS 權重一覽)](https://muki.tw/tech/css-specificity-document/)