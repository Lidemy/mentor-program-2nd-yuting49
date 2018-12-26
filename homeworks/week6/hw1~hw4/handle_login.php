<?php
    include_once('conn.php');
    if (
        isset($_POST['username'])  && isset($_POST['password']) &&
        !empty($_POST['username']) && !empty($_POST['password']) 
    ){
        $username = $_POST['username'];
        $password = $_POST['password'];
        //prepared statement
        $stmt = $conn->prepare("SELECT * FROM yuting_users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        //原始指令
        //$sql = "SELECT * from yuting_users where username='$username'";
        //$result =  $conn->query($sql);
       
        if(!$result){
            echo "Error:" . $conn->error;
            header('Location: ./login.php');
            exit();
        }
        if($result->num_rows <= 0){
        ?>
        <script>
            alert('帳號或密碼錯誤！');
            window.location = './login.php'
        </script>
        <?php
        }
        $row=$result->fetch_assoc();
        $hash_password=$row['password'];
        
        if(password_verify($password, $hash_password)){
            $token = uniqid();
            $sql ="DELETE FROM yuting_certificates WHERE username ='$username'";
            $conn->query($sql);
            $sql ="INSERT INTO yuting_certificates(username, token) VALUES('$username','$token')";
            $result =  $conn->query($sql);

            setcookie("token", $token, time()+3600*24);
            setcookie("username", $username, time()+3600*24);
            header('Location: ./index.php');
        }else{
        ?>
        <script>
            alert('帳號或密碼錯誤！');
            window.location = './login.php'
        </script>
        <?php
        }
    }else{
    ?>
    <script>
        alert('請輸入帳號、密碼！');
        window.location = './login.php'
    </script>
    <?php
    }
    ?>