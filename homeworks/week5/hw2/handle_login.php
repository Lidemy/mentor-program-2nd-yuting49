<?php
    require_once('conn.php');
    if (
        isset($_POST['username']) && 
        isset($_POST['password']) &&
        !empty($_POST['username']) && 
        !empty($_POST['password']) 
    ){
        $username = $_POST['username'];
        $password = $_POST['password'];
    
       $sql = "SELECT * from yuting_users where username='$username' and password='$password'";
       $result =  $conn->query($sql);
       if(!$result){
            echo "Error:" . $conn->error;
       }

       if($result && $result->num_rows > 0){
            setcookie("username", $username, time()+3600*24);
            header('Location: ./index.php');
        }else{
?>
<script>
    alert('帳號或密碼錯誤！');
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