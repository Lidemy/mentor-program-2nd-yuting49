<?php 
    session_start();
    include_once('./navbar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'/>
        <title>註冊</title>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
        <link rel='stylesheet' href='./signin.CSS' />
    </head>
    <body>
        <div class='container'> 
            <form class='form-signin' action='./handle_register.php' method='POST' >
                <div>帳號：</div>
                    <input class='form-control' name='username' type='text' placeholder='請輸入帳號'>
                <div>密碼：</div>
                    <input class='form-control' name='password' type='password' placeholder='請輸入密碼'> 
                <div>確認密碼：</div>
                    <input class='form-control' name='confirm' type='password' placeholder='請再次輸入密碼以確認'> 
                <div>暱稱：</div>
                    <input class='form-control' name='nickname' type='text' placeholder='我們該怎麼稱呼你/妳'>
                <button class='btn btn-lg btn-primary btn-block' type='submit'>註冊</button>
            </form>
        </div>
    </body>
</html>