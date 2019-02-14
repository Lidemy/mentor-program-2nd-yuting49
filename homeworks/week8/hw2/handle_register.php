<?php
    // Start the session
    session_start();
    require_once('./conn.php');
    if (
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['confirm']) && !empty($_POST['confirm']) &&
        isset($_POST['nickname']) && !empty($_POST['nickname'])
    ){
        if($_POST['password']===$_POST['confirm']){
            $_SESSION['username'] = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_SESSION['nickname'] = $_POST['nickname'];
        //prepare statement    
            $stmt = $conn->prepare("INSERT INTO yuting_users (username, password, nickname) VALUES(?, ?, ?) ");
            $stmt->bind_param("sss", $_SESSION['username'], $password, $_SESSION['nickname'] );
            $result = $stmt->execute();
            $stmt->close();
            header('Location: ./index.php');
        
        }else{
        //密碼不一致，請重填密碼
?>
            <script>
                alert('密碼不一致，請重新確認');
                window.location = './register.php'
            </script>
<?php
        }
    }else{
    //若有欄位為空，請使用者確實填寫  TODO：這裡也可以改用Ajax
?>
        <script>
            alert('每項欄位皆為必填，請檢查是否有遺漏');
            window.location = './register.php'
        </script>
<?php
    }
?>