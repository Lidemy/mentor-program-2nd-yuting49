<?php
    session_start();
    //資料庫連線
    require_once('./conn.php');
    //確認值不為空
    if (
        isset($_POST["comment"]) && !empty($_POST["comment"]) 
    ){
    //從前端取得欲寫入資料庫的資訊
        $comment = $_POST["comment"];
        $username = $_SESSION["username"];
        $parent_id = $_POST["parent_id"];
    //prepare
        $stmt = $conn->prepare("INSERT INTO yuting_comments (username, comment, parent_id) 
        VALUES(?,?,?)");
        $stmt->bind_param("ssi", $username, $comment, $parent_id);
        $result = $stmt->execute();
        $stmt->close();

    //如果連線成功、資料寫入，取得剛寫入的該筆資料id
        if($result){
                $last_id = $conn->insert_id;
                $arr = array("result" => "success","id" => $last_id);
                echo json_encode($arr);
        }else{
?>
            <script>
                alert("Error:" . $conn->error);
                window.location = './index.php'
            </script>
<?php
        }
    //若值為空，請其輸入內容後再提交
    }else{
?>
        <script>
            alert("請輸入內容再提交！");
            window.location = './index.php'
        </script>
<?php
    }
?>