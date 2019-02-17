<?php
    session_start();
    include_once('./conn.php');
    function escape($str){
        return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
    }
    //取得欲刪除留言的 id 與 parent_id
    $id = escape($_POST['id']); 
    $parent_id = escape($_POST['parent_id']);
    $username = escape($_POST['username']);
    //確認作者與使用者相符
    if ($username === $_SESSION['username']) {
        //刪除主留言與子留言
        if ($parent_id === '0') {
            $stmt = $conn->prepare("DELETE FROM yuting_comments WHERE id = ? or parent_id = ? ");
            $stmt->bind_param('ii', $id, $parent_id);
            $result = $stmt->execute();
            $stmt->close();
        //僅刪除子留言
        } else {
            $stmt = $conn->prepare("DELETE FROM yuting_comments WHERE id = ? ");
            $stmt->bind_param('i', $id);
            $result = $stmt->execute();
            $stmt->close();
        }
        //回傳結果
        if ($result) {
            $arr = array('result' => 'success', 'id' => $id, 'parent_id' => $parent_id);
            echo json_encode($arr);
        } else {
            $arr = array("result" => "fail");
            echo json_encode($arr);
        }
    } else {
        //作者與使用者不相符
        header('./index.php');
    }
    
    
    
?>