<?php include_once('./check_login.php')?>
<nav class="navbar navbar-dark bg-dark">
    <div>
        <a class="navbar-brand" href="./index.php">留言板</a>
    </div>
    
    <div>
        <a class="navbar-brand" href="./register.php">註冊</a>
    <?php  
    //可改用session 判斷登入與否
    if($user){ //若為登入狀態，顯示登出按鈕
    ?>   
        <a class="navbar-brand" href="./logout.php">登出</a>
    <?php  
    } else { //若為登出狀態，顯示登入按鈕
    ?>
        <a class="navbar-brand" href="./login.php">登入</a>
    <?php  
    }
    ?>
    
    </div>    
</nav>
