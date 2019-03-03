## gulp 跟 webpack 有什麼不一樣？我們可以不用它們嗎？

gulp：主要是把工作流程自動化，將需要執行的任務寫成腳本，並透過指令一次執行多個任務。

webpack：主要是把資源模組化，讓所有資源都可以 import 和 export 。

webpack 可以透過 gulp 的 plugin 成為 gulp 自動化工作中的一部分。兩者雖有部分功能重疊（編譯與壓縮 CSS、JS），但兩者定位不同，應為互補關係。

使用工具的目的在於可以節省時間、或完成原本做不到的事。用或不用這個工具，端看使用這個工具是否能幫助自己達成目的或節省時間。

例如：每次更改 SASS 檔案以後都要轉譯成 CSS 的時間；或是將 ES6 轉譯成 ES5 的時間等等。像這樣固定的任務，透過使用 gulp 設定一次以後，再有同樣的要求就可以一次透過一個指令完成多個任務。不用也可以，只是在實作上會比較麻煩。

## hw3 把 todo list 這樣改寫，可能會有什麼問題？
每次新增或刪除都會重新渲染整個畫面，但有些地方並沒有更動，似乎沒有必要這樣做。當資料量大時，可能會產生效能上的問題。

## CSS Sprites 與 Data URI 的優缺點是什麼？
### CSS Sprites：
把原版分開的圖片合成一張圖片，再透過調整 CSS 的方式顯示想要顯示的部分。
* 使用 CSS Sprites 的優點：
    1. 可以減少網頁主機端的圖檔數量(連帶減輕主機的讀取次數)
    2. 加快網頁頁面讀取的速度，有效降低圖片的 HTTP 請求數
* 使用 CSS Sprites 的缺點：
    1. 需事先合併成一張大圖，若使用圖片有變動，需重新合併。
    2. 需另外計算位置與大小，並於 CSS 設定，使用上較麻煩。
* 補充：有[工具](https://css.spritegen.com)可以協助整合圖片，也有[適用 RWD 的版本](http://responsive-css.spritegen.com)


### Data URI：
Data URI 是一種檔案格式，其資料是透過 base64 編碼後，以文字的方式儲存。
* 使用 Data URI 的優點：
    1. 可以直接寫進 HTML 或 CSS 中，不需要透過外部的檔案儲存。
    2. 省去原本抓取該圖檔的請求，是減少 HTTP 請求的最佳方案。
* 使用 Data URI 的缺點：
    1. 因為不是真正的圖檔，所以瀏覽器沒辦法快取。
    2. 可讀性較差，不像載入圖片時，很清楚檔名相關內容。
    4. 當檔案資料有變化時，所有內嵌它的網頁都要重新產生編碼。
    5. 經過 Base64 編碼後的檔案會比原始檔案大。
* 補充：Data URI 也有線上的[編碼工具](https://dataurl.sveinbjorn.org/#dataurlmaker)可以利用

### 參考資料
* [what ard CSS Sprites?](https://www.maxcdn.com/one/visual-glossary/css-sprites/)
* [使用 Data URI 將圖片以 base64 編碼並內嵌至網頁，加速載入速度](https://blog.gtwang.org/web-development/minimizing-http-request-using-data-uri/)