<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>登入</title>
        <link rel="stylesheet" href="./board.CSS" />
    </head> 
    <body>
        <?php include_once('./navbar.php')?>
        <form class='users' action="./handle_login.php" method="POST" >
                <div class='account'> 帳號： <input name='username' type='text'> </div>
                <div class='account'> 密碼： <input name='password' type='password'> </div>
                <input  class='btn' type='submit' value="登入">
        </form>
    </body>
</html>

