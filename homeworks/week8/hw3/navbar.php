
<nav class="navbar navbar-dark bg-dark">
    <div>
        <a class="navbar-brand" href="./index.php">首頁</a>
    </div>
    
    <div>
        <a class="navbar-brand" href="./register.php">註冊</a>
    <?php  

    if(true){ //若為登入狀態，顯示登出按鈕
    ?>   
        <a class="navbar-brand" href="./logout.php">登出</a>
        <a class="navbar-brand" href="./transaction.php">結帳</a>
    <?php  
    } else { //若為登出狀態，顯示登入按鈕
    ?>
        <a class="navbar-brand" href="./login.php">登入</a>
    <?php  
    }
    ?>
    
    </div>    
</nav>
