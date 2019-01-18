<?php
    require_once("./conn.php");
    if (
        isset($_POST["comment"]) && !empty($_POST["comment"]) 
    ){
        $comment = $_POST["comment"];
        $username = $_POST["username"];
        $parent_id = $_POST["parent_id"];
    
        $sql = "INSERT INTO yuting_comments (username, comment, parent_id) 
                VALUES('$username','$comment','$parent_id')";

        if($conn->query($sql)){
                $last_id = $conn->insert_id;
                $arr = array("result" => "success","id" => $last_id);
                echo json_encode($arr);
        }else{
?>
            <script>
                alert("Error:" . $conn->error);
                window.location = "./index.php"
            </script>
<?php
        }
    }else{
?>
        <script>
            alert("請輸入內容再提交！");
            window.location = "./index.php"
        </script>
<?php
    }
?>