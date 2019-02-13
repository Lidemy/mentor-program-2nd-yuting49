## 什麼是 DNS？Google 有提供的公開的 DNS，對 Google 的好處以及對一般大眾的好處是什麼？
* 什麼是 DNS？
    * DNS 全名叫 Domain Name System ，網域名稱系統。
    * Domain Name 為網域名稱，通常是有意義的英文字母組合（例如： www.pchome.com ），而 IP 位址則是一串無意義的數字(例如：203.70.70.1)。當使用者輸入 Domain Name 後，瀏覽器必須要先去一台有 Domain Name 和 IP 對應資料的主機去查詢 IP，而這台提供查詢服務的主機，我們稱它為 Domain Name System Server，簡稱 DNS Server。
    * Domain Name 和 IP 位址的關係就像是名字和電話，但Domain Name 和 IP 位址都是獨一無二的存在，不會重複。
* 大眾使用 Google 提供的 DNS，對 Google 的好處
    * 可以知道使用者去了哪些網站，蒐集使用數據，可以提供給使用者更好的服務，也能更精準的投放廣告。
* 一般大眾使用 Google 提供的 DNS 的好處
    * 可加密傳輸資料以提升網路安全、使用體驗更佳（據稱較一般 ISP 所提供的服務更快速）
* 參考資料
    * AWS：[What is DNS ?](https://aws.amazon.com/tw/route53/what-is-dns/)
    * google：[public DNS](https://developers.google.com/speed/public-dns/)

## 什麼是資料庫的 lock？為什麼我們需要 lock？
* lock 是為了實現交易的隔離性與資料的一致性所發展的一種機制。當資料異動時，可以將資料鎖住，當資料修改完成後才開放給其他人使用。lock 機制可避免多人同時存取、修改資料庫資料時發生問題。
* 鎖定（lock）可以分成基本鎖定與特殊鎖定兩大類。基本鎖定又可分成共用鎖定(shared lock)與獨占鎖定(exclusive lock) 。一般而言，當Select資料時會使用共用鎖定，Insert、Update和Delete資料時會使用獨佔鎖定。特殊鎖定又可分成意圖鎖定(Intent lock)、更新鎖定(Update lock)、綱要鎖定(Schema lock)與大量新鎖定(Bulk update lock)。
* 參考資料/延伸閱讀：
    * [淺談sql-server的鎖定原理](https://cbw0731.pixnet.net/blog/post/5143648-【轉貼】淺談sql-server的鎖定原理)
    * [資料庫的交易鎖定 Locks](https://www.qa-knowhow.com/?p=383)
    * MySQL：[about lock](https://dev.mysql.com/doc/search/?q=lock&d=&p=1)
        * [8.11 Optimizing Locking Operations](https://dev.mysql.com/doc/refman/8.0/en/locking-issues.html)
        * [12.14 Locking Functions](https://dev.mysql.com/doc/refman/8.0/en/locking-functions.html)
        * [13.3 Transactional and Locking Statements](https://dev.mysql.com/doc/refman/8.0/en/sql-syntax-transactions.html)
        * [15.14.2 InnoDB INFORMATION_SCHEMA Transaction and Locking Information](https://dev.mysql.com/doc/refman/8.0/en/innodb-information-schema-transactions.html)
        * [15.7 InnoDB Locking and Transaction Model](https://dev.mysql.com/doc/refman/8.0/en/innodb-locking-transaction-model.html)
        * [29.3.1 The Locking Service](https://dev.mysql.com/doc/refman/8.0/en/locking-service.html)
## NoSQL 跟 SQL 的差別在哪裡？
* SQL：Structured Query Language
    * 關聯式資料庫
    * 需事先定義 Schema，資料表內的欄位名稱和資料型態都是固定的，資料表間具關聯性。
    * ACID 特性：原子性（atomicity，或稱不可分割性）、一致性（consistency）、隔離性（isolation，又稱獨立性）、持久性（durability）

* NoSQL：not only SQL
    * 非關聯式資料庫
    * 打破Schema欄位架構的限制，改以 Key-Value 模式儲存資料。Key-Value模式是將一筆資料的結構簡化到只有一個Key值對應到一個Value值，每一筆資料之間沒有關連性，可以任意切割或調整。
    * CAP 理論：資料一致性（Consistent）、可用性（Availability）和中斷容忍性（Partition Tolerance）。理論上無法同時兼顧CAP這三種特性，所以，NoSQL資料庫通常會選擇其中兩種特性來設計，通常是選擇CP或AP。
    * 優點：擴展容易、讀寫快速、成本較低
    * 類型：Key-Value資料庫，記憶體資料庫（In-memory Database）、圖學資料庫（Graph Database）以及文件資料庫（Document Database） 
    * 適用時機：資料庫 schema 經常變化、管理大規模資料
* 參考資料：
    * [AWS：什麼是 NoSQL 資料庫？](https://aws.amazon.com/tw/nosql/)
    * [了解NoSQL不可不知的5項觀念](https://www.ithome.com.tw/news/92506)
    * [快速認識4類主流NoSQL資料庫](https://www.ithome.com.tw/news/92507)
    * [關於NoSQL與SQL的區別](https://read01.com/GPnEx.html#.XE_tli33VQI)
    * [NoSQL 入門指引](https://www.openfoundry.org/tw/news/9040)

## 資料庫的 ACID 是什麼？
* ACID，是指資料庫管理系統（DBMS）在寫入或更新資料的過程中，為保證事務（transaction）是正確可靠的，所必須具備的四個特性：原子性（atomicity，或稱不可分割性）、一致性（consistency）、隔離性（isolation，又稱獨立性）、持久性（durability）。
    * 在資料庫系統中，一個事務是指：由一系列資料庫操作組成的一個完整的邏輯過程。例如銀行轉帳，從原帳戶扣除金額，以及向目標帳戶添加金額，這兩個資料庫操作的總和，構成一個完整的邏輯過程，不可拆分。這個過程被稱為一個事務，具有 ACID 特性。

* Atomicity（原子性）：事務（transaction）在執行過程中若發生錯誤，會被恢復（Rollback）到事務開始前的狀態，就像這個事務從來沒有執行過一樣。亦即每一個 transaction 是不可被分割的。
* Consistency（一致性）：指的是資料在交易前後必須保持一致。例如：甲乙兩人在銀行共存有五十萬元，甲有三十萬，乙有二十萬，在甲轉帳給乙二十萬後，甲乙的總合仍為五十萬元。
* Isolation（隔離性）：資料庫允許多個並行事務同時對其數據進行讀寫和修改的能力，隔離性可以防止多個事務並發執行時由於交叉執行而導致數據的不一致。每一筆對資料庫的請求(交易)之間相互獨立，各自執行，不會互相影響。
* Durability（持久性）：transaction 結束後，對於數據的修改是永久的，即使系統故障也不會消失。
* 參考資料：[Database Transaction第一話: ACID](http://karenten10-blog.logdown.com/posts/192629-database-transaction-1-acid)、[維基百科](https://zh.wikipedia.org/wiki/ACID)