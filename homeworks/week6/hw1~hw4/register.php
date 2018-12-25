<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>註冊</title>
        <link rel="stylesheet" href="./board.CSS" />
    </head>
    
    <body>
        <?php include_once('./navbar.php')?>
        <form class='users' action="./handle_register.php" method="POST" >
                <div class='account'> 帳號： <input name='username' type='text'> </div>
                <div class='account'> 密碼： <input name='password' type='password'> </div>
                <div class='account'> 暱稱： <input name='nickname' type='text'></div>
                <input  class='btn' type='submit' value="註冊">
        </form>
    </body>
</html>