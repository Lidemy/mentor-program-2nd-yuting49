<?php
    require_once('conn.php');
    if (
        isset($_POST['reply']) && 
        !empty($_POST['reply']) 
    ){
        $reply = $_POST['reply'];
        $parent_id = $_POST['parent_id']; 
        $username = $_POST['username'];

        $sql = "INSERT INTO yuting_comments (username, comment, parent_id) 
        VALUES('$username','$reply',$parent_id)";
        if($conn->query($sql)){
            echo $sql;
            header("Location:./index.php");            
            }else{
?>
                <script>
                    alert("Error:" . $conn->error);
                    //window.location = './index.php'
                </script>
            
<?php
            }
        }else{
?>
            <script>
                alert('請輸入內容再提交！');
                //window.location = './index.php'
            </script>
<?php   }
?>