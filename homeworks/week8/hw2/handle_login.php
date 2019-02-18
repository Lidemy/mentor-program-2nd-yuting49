<?php
    session_start();
    include_once('conn.php');
    function escape($str){
        return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
    }
    
    if (isset($_POST['username']) && !empty($_POST['username']) &&
        isset($_POST['password']) && !empty($_POST['password'])) {
        
        $_POST['username'] = escape($_POST['username']); 
        $_POST['password'] = escape($_POST['password']);

        $username = $_POST['username'];
        $password = $_POST['password'];
        //prepared statement 查詢是否有此帳號
        $stmt = $conn->prepare("SELECT * FROM yuting_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        
        if (!$result) {
            echo "Error:" . $conn->error;
            header('Location: ./login.php');
            exit();
        }
            //如果沒有帳號
            if ($result->num_rows <= 0) {
?>
                <script>
                    alert('帳號或密碼錯誤！');
                    window.location = './login.php'
                </script>
        <?php
            } else {
            //如果有帳號，取得 hash_password，進行驗證
                $row = $result->fetch_assoc();
                $hash_password = $row['password'];
                
                if (password_verify($password, $hash_password)) {
                    $_SESSION['username'] = $username;
                    $_SESSION['nickname'] = $row['nickname'];
                    header('Location: ./index.php');
                } else {
                //驗證未通過
        ?>
                    <script>
                        alert('帳號或密碼錯誤！');
                        window.location = './login.php'
                    </script>
<?php
                }
            }
    } else {
    //若有欄位為空，請使用者確實填寫  TODO：這裡也可以改用 Ajax
?>
        <script>
            alert('請輸入帳號、密碼！');
            window.location = './login.php'
        </script>
<?php
    }
?>