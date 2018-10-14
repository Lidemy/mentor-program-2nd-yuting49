## 請找出三個課程裡面沒提到的 HTML 標籤並一一說明作用。
<br>：換行
<strong><b>：粗體
<abbr>：滑鼠游標移到該縮寫時，會顯示縮寫的全稱

## 請問什麼是盒模型（box modal）
盒模型由內而外，依序由content(內容)、padding(內邊距)、border(框線)、margin(外邊距)組成。可透過 CSS 調整盒模型的各項設定。
width & height 的數值預設是以 content-box 計算。可透過設定 box-sizing: border-box，改變計算方式，將 padding 和 border 也涵蓋在內。  

## 請問 display: inline, block 跟 inline-block 的差別是什麼？
display 可調整元素的呈現方式，不同的元素預設的呈現方式不同，例如：div、h1、p 預設是以 block 的形式呈現；span、a 則是預設以 inline 的方式顯示。

display：inline，元素會並排顯示，其容器大小以內容大小為準。不可調寬高、上下 margin。
display：block，表示區塊，一個 block 會獨佔一行。可調寬高、邊距。
display：inline-block，擁有 block 的屬性，可調整寬高與邊距。同時也可以並排顯示。

## 請問 position: static, relative, absolute 跟 fixed 的差別是什麼？

position 可調整定位，可以透過設定 top、left、bottom、right 的數值調整位置。

static：預設的定位方式，會按照原本瀏覽器預設的位置去排版。
relative：根據原先預設的位置相對地調整自己的定位，不會影響到其他元素的位置。
absolute：針對特定的參考點（往上最近的非 static 定位的元素）進行定位，若無參考點，將依據 body 進行定位。其他的元素會取代、向上遞補其位置。
fixed：根據瀏覽器視窗定位，不管頁面如何捲動，它還是會固定在相同的位置。
