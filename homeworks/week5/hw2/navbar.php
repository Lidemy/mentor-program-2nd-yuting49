<?php include_once('./check_login.php')?>
<nav>
    <div class='nav'>
        <div>
            <a href='./index.php'>留言板</a>
        </div>
        <div>
            <a href='./register.php' target='blank'>註冊</a>
            <?php  if($user){
            ?>   
                <a href="./logout.php">登出</a>
            <?php  } else {
            ?>
                <a href="./login.php">登入</a>
            <?php  }
            ?>
        </div>    
    </div>
</nav>