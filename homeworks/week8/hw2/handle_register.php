<?php
    session_start();
    require_once('./conn.php');
    function escape($str){
        return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
    }

    if (
        isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password']) &&
        isset($_POST['confirm']) && !empty($_POST['confirm']) &&
        isset($_POST['nickname']) && !empty($_POST['nickname'])
    ){
        $_POST['username'] = escape($_POST['username']); 
        $_POST['password'] = escape($_POST['password']);
        $_POST['confirm'] = escape($_POST['confirm']);
        $_POST['nickname'] = escape($_POST['nickname']);
        
        if ($_POST['password'] === $_POST['confirm']) {
            $_SESSION['username'] = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_SESSION['nickname'] = $_POST['nickname'];
        
            //資料庫的 username 雖然有設 unique，但還是能使用相同帳號註冊
            //確認帳號是否重複
            $duplicate = mysqli_query($conn,"select * from yuting_users where username=".$_POST['username']);
            if (mysqli_num_rows($duplicate)>0) {
?>
            <script>
                alert('此帳號已有使用者註冊');
                window.location = './register.php'
            </script>
    <?php
            }

            //註冊帳號寫入資料庫    
            $stmt = $conn->prepare("INSERT INTO yuting_users (username, password, nickname) VALUES(?, ?, ?) ");
            $stmt->bind_param("sss", $_SESSION['username'], $password, $_SESSION['nickname']);
            $result = $stmt->execute();
            $stmt->close();
            header('Location: ./index.php');
        
        } else {
    ?>
            <script>
                alert('兩次輸入密碼不一致，請重新確認');
                window.location = './register.php'
            </script>
<?php
        }
    } else {
    //若有欄位為空，請使用者確實填寫  TODO：這裡也可以改用 Ajax
?>
        <script>
            alert('每項欄位皆為必填，請檢查是否有遺漏');
            window.location = './register.php'
        </script>
<?php
    }
?>