<?php
    require_once('conn.php');
    if (
        isset($_POST['comment']) && 
        !empty($_POST['comment']) 

    ){
        $comment = $_POST['comment'];
        $username = $_COOKIE['username'];
        $parent_id = $_POST['parent_id'];
    
        $sql = "INSERT INTO yuting_comments (username, comment, parent_id) 
                VALUES('$username','$comment','$parent_id')";
        if($conn->query($sql)){
            ?>
            <script>
                //alert('新增成功！');
                window.location = './index.php'
            </script>
            
            <?php
        }else{
            ?>
            <script>
                alert("Error:" . $conn->error);
                window.location = './index.php'
            </script>
            
            <?php
        }
    }else{
?>
<script>
    alert('請輸入內容再提交！');
    window.location = './index.php'
</script>

<?php
    }
?>