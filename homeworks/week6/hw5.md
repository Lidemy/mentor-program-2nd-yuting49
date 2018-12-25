## 請說明 SQL Injection 的攻擊原理以及防範方法
- 原理：藉由特殊字元，改變語法上的邏輯，透過 user 輸入的文字，順利執行惡意的 SQL 指令，駭客就能取得（甚至刪除）資料庫的所有內容。
- 舉例：
    1. `select * from members where account='' or 1=1 /*' and password=''`因為「/*」在 MySQL 語法中代表註解的意思，所以「/*」後面的字串通通沒有執行，而這句判斷式「1=1」永遠成立，駭客就能登入此網站成功。
    2. 加入 `；DROP TABLE users`，可刪除資料。
- 防範：
    1. 使用 Prepared Statement，進行參數化查詢（先執行 SQL 指令才填入參數）
        ```php
        $stmt = $dbh->prepare("INSERT INTO REGISTRY (name, value) VALUES (:name, :value)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':value', $value);
        ```
    2. PDO：PDO 有提供 SQL Injection 的防護機制，使用 bindValue 的方式，PDO 會自動檢查數據格式，並轉換特殊字元，再將 User Input 填入 SQL 語法中。
- 參考資料：
    - [SQL Injection 常見的駭客攻擊方式](http://www.puritys.me/docs-blog/article-11-SQL-Injection-常見的駭客攻擊方式.html)
    - [網路安全](https://ihower.tw/rails/security.html)

## 請說明 XSS 的攻擊原理以及防範方法
- 原理：駭客可以將惡意的指令放在網頁上讓其他使用者執行。
- 類型：
    - 儲存型 XSS：將程式碼提交到資料庫，瀏覽器載入網頁就會執行該程式碼。
    - 反射型 XSS：將程式碼存在 URL，用戶打開連結就會執行該程式碼。
    - DOM型 XSS：指網頁上的 JavaScript 在執行過程中，沒有詳細檢查資料使得操作 DOM 的過程代入了惡意指令。
- 舉例：
``<script>alert('HACK YOU!');</script>
<img src=javascript:alert('HACK YOU!')>
<table background="javascript:alert('HACK YOU!')">
<script>document.write(document.cookie);</script>``
- 防範：對使用者的輸入進行過濾，例如：使用 PHP 的 htmlspecialchars() 
- 參考資料：
    - [【基本功】 前端安全系列之一：如何防止XSS攻击？](https://mp.weixin.qq.com/s/kWxnYcCTLAQp5CGFrw30mQ)
    - [甚麼是-xss？簡介黑客常用攻擊技倆](https://hkitblog.com/甚麼是-xss？簡介黑客常用攻擊技倆/)

## 請說明 CSRF 的攻擊原理以及防範方法
- 原理：在使用者「登入」網站的狀態，在「使用者不知情」的情況下，攻擊者可以利用別人的權限去執行網站上的操作，例如刪除資料。
- 舉例：`<img src="/posts/delete_all">`
- 防範：
    1. 檢查 Request header 的 Referer，看看這個 Request 是不是從合法的網域過來
    2. 加上圖形或簡訊驗證碼
    3. CSRF token
    4. Double Submit Cookie
- 參考資料：
    - [讓我們來談談 CSRF](https://blog.techbridge.cc/2017/02/25/csrf-introduction/)
    - [從防禦認識 CSRF](https://www.ithome.com.tw/voice/115822)

## 請舉出三種不同的雜湊函數
* 雜湊函數是將任意內容轉換為固定位元的雜湊值（hash value），為單向函數，無法從雜湊值推回原本的內容。
* MD5、Bcrypt、SHA-256

## 請去查什麼是 Session，以及 Session 跟 Cookie 的差別
*  Session 是一種機制，主要用來紀錄使用者資訊，讓 Server 可以「分辨」同個使用者發出的 request。 因為 HTTP 是無狀態的設計，Server 不會記得 client 的狀態，為了解決這個問題，才有 Session 機制的產生。
* 
    * Session 和 Cookie 的差別：
    * Session 儲存在 server 端，Session 是一種機制。
    * Cookie 儲存在 client 端，Cookie 是存放用戶資料（以增進使用者體驗）的工具。有可能被修改，有生命期限，只對本來的 domain 有效。
* 參考資料：
    * [你喜歡吃餅乾嗎？我是還好（session 與 cookie](https://ithelp.ithome.com.tw/articles/10187441)
    * [會員系統用Session還是Cookie? ](https://progressbar.tw/posts/92)

## `include`、`require`、`include_once`、`require_once` 的差別
* include 和 require 的差別：
    * include 在執行時，如果被引入的檔案發生錯誤的話，會顯示警告，不會立刻停止。通常使用於程式的流程敘述中，例如 if...else 等。 include 可用在迴圈，但 require 不行。
    * require 如果被引入的檔案發生錯誤的話，會顯示錯誤，立刻終止程式，不再往下執行。
* include、include_once 的差別 ( require、require_once 的差別) ：
    * include (require)：若檔案已經在其他地方被引入過，還是會重複引入。
    * include_once (require_once)：在引入檔案前，會先檢查檔案是否已經在其他地方被引入過了。若有，就不會再重複引入。