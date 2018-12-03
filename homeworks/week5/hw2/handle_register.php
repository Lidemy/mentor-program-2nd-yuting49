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
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];
    
        $sql = "INSERT INTO yuting_users (username, password, nickname) VALUES('$username','$password','$nickname')";
        if($conn->query($sql)){
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