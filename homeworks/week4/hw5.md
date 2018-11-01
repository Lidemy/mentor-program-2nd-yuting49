## 1.什麼是 DOM？
* DOM 為 Document Object Model 的縮寫，中文翻譯是文件物件模型。是 HTML、XML 和 SVG 文件的程式介面。它提供了一個將 Html 文件以樹狀結構表示的格式，並定義讓程式可以存取並改變文件架構（Html 標籤）、風格（CSS 外觀）和內容的方法。DOM 提供了文件以擁有屬性與函式的節點與物件組成的結構化表示。節點也可以附加事件處理程序，一旦觸發事件就會執行處理程序。 本質上，它將網頁與腳本或程式語言連結在一起。
* 當網頁加載時，瀏覽器會創建 DOM 作為 HTML 的编程接口(programming interface)，它會將 HTML document 進行結構化，組成樹枝狀的物件架構，把 document 中的 tag，看成是一個個節點(node)， 再利用 JavaScript(或其他程式語言) 來操縱節點，進而達成 JavaScript 與網頁的互動。
* 參考資料：[MDN](https://developer.mozilla.org/zh-TW/docs/Web/API/Document_Object_Model)、[W3C DOM 簡介](https://openhome.cc/Gossip/JavaScript/W3CDOM.html)

## 2.什麼是 Ajax？
* Ajax 是 Asynchronous JavaScript and XML 的縮寫，意指非同步 JavaScript 及 XML，是 2005 年時由 Jesse James Garrett 所發明的術語，描述一種使用數個既有技術的「新」方法。這些技術包括 HTML 或 XHTML、層疊樣式表(CSS)、JavaScript、文件物件模型（DOM）、XML、XSLT 以及最重要的 XMLHttpRequest 物件。當這些技術被結合在 Ajax 模型中，Web 應用程式便能快速、即時更動介面及內容，不需要重新讀取整個網頁，讓程式更快回應使用者的操作。
* AJAX 出現後可以只向伺服器傳送必要的資料給予後端，後端再回應符合條件的資料到前端，而前端在加以渲染成畫面。
* 參考資料：[MDN](https://developer.mozilla.org/zh-TW/docs/Web/Guide/AJAX)、[維基](https://zh.wikipedia.org/wiki/AJAX)

## 3.HTTP method 有哪幾個？有什麼不一樣？
1. GET ： 從伺服器端取得我們想要的資料。
2. HEAD ： 和 get 一樣，只是 head 只會取的 HTTP header 的資料。 
3. POST ： 從客戶端送資料給伺服器。新增一項資料。（如果存在會新增一個新的）
4. PUT ： 新增一項資料，如果存在就覆蓋過去。（還是只有一筆資料）
5. PATCH ： 附加新的資料在已經存在的資料後面。（資料必須已經存在，patch 會擴充這項資料）
6. DELETE ： 刪除資料。
7. CONNECT ： 開啟客戶端與所請求資源之間的雙向通到，可用來建立 TUNNEL。
8. OPTION ： 看伺服器支援的 method，描述指定資源的溝通方法（communication option）。
9. TRACE ： 方法會與指定資源標明的伺服器之間，執行迴路返回測試（loop-back test）。

* 參考資料：[MDN](https://developer.mozilla.org/zh-TW/docs/Web/HTTP/Methods)、[常見的HTTP METHOD的不同性質分析：GET,POST和其他4種METHOD的差別](https://data-sci.info/2015/10/24/常見的http-method的不同性質分析：getpost和其他4種method的差別/)、[HTTP 請求方法 — HEAD、PUT、DELETE](https://notfalse.net/45/http-head-put-delete)

## 4.`GET` 跟 `POST` 有哪些區別，可以試著舉幾個例子嗎？
GET
* 透過 URL 帶資料，資料傳遞有長度限制。
* 安全性較差，資料放在 Header 上。
* 執行速度較快，若等待反應（response）時間太長會自動重發請求（request）。
POST
* 資料傳遞量不受限制。
* 安全性較佳，資料放在 Body
* 執行速度較慢。

* 參考資料：[HTTP GET 與 POST 的比較及使用時機](https://jax-work-archive.blogspot.com/2014/02/http-get-post-compare-and-use-opportunity.html)、[淺談 HTTP Method：表單中的 GET 與 POST 有什麼差別？](https://blog.toright.com/posts/1203/淺談-http-method：表單中的-get-與-post-有什麼差別？.html)、[常見的HTTP METHOD的不同性質分析：GET,POST和其他4種METHOD的差別](https://data-sci.info/2015/10/24/常見的http-method的不同性質分析：getpost和其他4種method的差別/)

## 5.什麼是 RESTful API？
* REST 的全名是 Representational State Transfer，簡稱REST。RESTful API是一種設計風格，這種風格使API設計具有整體一致性，易於維護、擴展，並且充份利用HTTP協定的特點(GET/POST/PUT/DELETE)。使用 URI 來表示資源，用各個不同的 HTTP 動詞（ GET、POST、PUT 和 DELETE 方法 ）來表示對資源的各種操作行為，這樣做的好處就是資源和操作分離，讓對資源的管理有更好的規範，及前端（串接 API 或使用 API 的人）可以很快速的了解你的 API ，省去很多不必要的溝通。

* 參考資料：[認識 RESTful API](https://github.com/twtrubiks/django-rest-framework-tutorial/tree/master/RESTful-API-Tutorial)、[淺談 REST 軟體架構風格 (Part.I) - 從了解 REST 到設計 RESTful！](https://blog.toright.com/posts/725/representational-state-transfer-軟體架構風格介紹-part-i-從了解-rest-到設計-restful！.html)、[淺談 REST 軟體架構風格 (Part.II) - 如何設計 RESTful Web Service](https://blog.toright.com/posts/1399/淺談-rest-軟體架構風格-part-ii-如何設計-restful-web-service.html)、[何謂RESTful API？](https://dotblogs.com.tw/jeffyang/2018/04/21/233001)

## 6.JSON 是什麼？
* JavaScript Object Notation，簡稱 JSON，是一種輕量級的資料交換語言，該語言以易於讓人閱讀的文字為基礎，用來傳輸由屬性值或者序列性的值組成的資料物件。JSON 可以是陣列 Array 形式、或者是物件 Object 形式。資料由 key 和 value 組成，兩者需成對出現，中間透過 (:) 來區隔。

* 參考資料：[MDN](https://developer.mozilla.org/zh-TW/docs/Learn/JavaScript/Objects/JSON)、[你不可不知的-json-基本介紹](https://blog.wu-boy.com/2011/04/你不可不知的-json-基本介紹/)

## 7.JSONP 是什麼？
* JSONP（JSON with Padding）是資料格式JSON的一種「使用模式」，可以讓網頁從別的網域要資料。

## 8.要如何存取跨網域的 API？
* JSONP
* CORS(Cross-Origin Resource Sharing)