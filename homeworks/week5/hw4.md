## 資料庫欄位型態 VARCHAR 跟 TEXT 的差別是什麼
VARCHAR 可以設定資料輸入的最大長度，TEXT 不能設置長度。
VARCHAR 會根據輸入的字數儲存資訊長度，而 TEXT 則是預設好要存多少長度(2的16次方)，不管最後實際輸入或長或短，都是一樣的資料儲存空間。


## Cookie 是什麼？在 HTTP 這一層要怎麼設定 Cookie，瀏覽器又會以什麼形式帶去 Server？
### Cookie 是什麼？
Cookie 是使用者在瀏覽網站時，網站傳送給瀏覽器的一小段文字，可讓網站儲存使用者的瀏覽資訊 (例如偏好語言和其他設定)，方便使用者下次瀏覽相同網站時套用同樣的設定，或是提供相對應的廣告。

### 為什麼要使用 Cookie ？
對公司來說：可以搜集客戶資料、使用習慣與偏好等。
對使用者來說：使用網路服務可以更個人化，例如不需要每次登入帳號，廣告像是有讀心術（雖然不知道是好是壞）等。

### Cookie 如何設定？如何運作？
伺服器收到瀏覽器的 Request 後， 就傳回一個 HTTP Response 到瀏覽器， 這個 Response 的 Header 可以包含了一個或者多個 Set-Cookie 欄， 這一欄包含了伺服器想儲存的 Cookie 資訊， 例如這個 Cookie 的名稱、 值、 有效日期、 保安性、 可使用的網域和路徑名稱等。

參考資料：
* [很清楚的 cookie 教學](http://taiwantc.com/js/js_tut_c_cookie0.htm#Cookie%20如何運作)
* [你喜歡吃餅乾嗎？我是還好（session 與 cookie）](https://ithelp.ithome.com.tw/articles/10187441)

延伸閱讀：
* [我遇過最難的 Cookie 問題](http://huli.logdown.com/posts/2223553-a-cookie-problem)
* [google 使用的 cookie 類型](https://policies.google.com/technologies/types?hl=zh-tw)


## 我們本週實作的會員系統，你能夠想到什麼潛在的問題嗎？
會員系統問題：
* 註冊時，密碼沒有雙重確認
* 密碼存明碼
* 以 cookie 儲存登入狀態（一般會使用 session？）
留言板問題：
* 留言無法刪除或編輯
* 雖然在 textarea 留言時有換行，但留言顯示時不會換行


