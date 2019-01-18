<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>登入</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="./signin.CSS" />
    </head> 
    <body>
        <?php include_once("./navbar.php")?>
        <div class="container"> 
            <form class="form-signin" action="./handle_login.php" method="POST" >
                <div>帳號：</div>
                    <input class="form-control" name='username' type='text' placeholder="請輸入帳號">
                <div>密碼：</div>
                    <input class="form-control" name='password' type='password' placeholder="請輸入密碼"> 
                <button class="btn btn-lg btn-primary btn-block" type="submit">登入</button>
            </form>
        </div>
    </body>
</html>
