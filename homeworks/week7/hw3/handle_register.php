<?php
    require_once('conn.php');
    if (
        isset($_POST['username']) && 
        isset($_POST['password']) &&
        isset($_POST['nickname']) &&
        !empty($_POST['username']) && 
        !empty($_POST['password']) &&
        !empty($_POST['nickname']) 
    ){
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $nickname = $_POST['nickname'];
    
        $stmt = $conn->prepare("INSERT INTO yuting_users (username, password, nickname) VALUES(?, ?, ?) ");
        $stmt->bind_param("sss", $username, $password, $nickname );
        $result = $stmt->execute();

        //$sql = "INSERT INTO yuting_users (username, password, nickname) VALUES('$username','$password','$nickname')";
        
        if($result){
        //if($conn->query($sql)){
            
            $token = uniqid();
            $sql ="DELETE FROM yuting_certificates WHERE username ='$username'";
            $conn->query($sql);
            $sql ="INSERT INTO yuting_certificates(username, token) VALUES('$username','$token')";
            $result =  $conn->query($sql);

            setcookie("token", $token, time()+3600*24);
            setcookie("username", $username, time()+3600*24);
            header('Location: ./index.php');

        }else{
            echo "Error:" . $conn->error;
?>
<script>
    alert('error');
    window.location = './register.php'
</script>
<?php
        }
    }else{
?>
<script>
    alert('請輸入帳號、密碼、暱稱！');
    window.location = './register.php'
</script>

<?php
}
?>