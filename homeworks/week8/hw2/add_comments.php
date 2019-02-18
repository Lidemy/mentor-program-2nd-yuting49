<?php
    session_start();
    require_once('./conn.php');
    function escape($str){
        return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
    }
    if (isset($_POST["comment"]) && !empty($_POST["comment"])) {
    //從前端取得欲寫入資料庫的資訊
        $comment = escape($_POST["comment"]);
        $username = escape($_SESSION["username"]);
        $parent_id = escape($_POST["parent_id"]);
        $postname = escape($_POST["postname"]);

    //確認登入狀態，身份於前端確認
        if ($_SESSION['username']) {
        $stmt = $conn->prepare("INSERT INTO yuting_comments (username, comment, parent_id) 
        VALUES(?,?,?)");
        $stmt->bind_param("ssi", $username, $comment, $parent_id);
        $result = $stmt->execute();
        $stmt->close();
        }

    //判斷使用者與主留言是否相符，以決定回覆外觀
    if ($_SESSION["username"] == $postname) {
        $if_same_author = true;
    } else {
        $if_same_author = false;
    } 
              
    //如果連線成功、資料寫入，取得剛寫入的該筆資料id
        if ($result) {
                $last_id = $conn->insert_id;
                $arr = array("result" => "success", "id" => $last_id, "if_same_author" => $if_same_author);
                echo json_encode($arr);
        } else {
                $arr = array("result" => "fail");
                echo json_encode($arr);
        }
    }
?>