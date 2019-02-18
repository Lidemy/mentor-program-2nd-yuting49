<?php
    session_start();
    include_once('./conn.php');
    //TODO：改 Ajax
    if (isset($_POST['comment']) && !empty($_POST['comment'])) {
        $comment = $_POST['comment'];
        $id= $_POST['id'];
        $username = $_POST['username'];

        if ($username === $_SESSION['username']) {
            $stmt = $conn->prepare("UPDATE yuting_comments SET comment = ? WHERE id = ? ");
            $stmt->bind_param("si", $comment, $id );
            $result = $stmt->execute();
            $stmt->close();
            ?>
            <script>
                alert('編輯成功！');
                window.location = './index.php'
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error:' . $conn->error);
                window.location = './index.php'
            </script>    
            <?php
        } 
    } else {
        ?>
        <script>
            alert('請輸入內容再提交！');
            window.location = './index.php'
        </script>
        <?php
    }   
?>