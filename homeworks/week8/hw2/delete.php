<?php
    //資料庫連線
    include_once('./conn.php');
    //取得欲刪除留言的id與parent_id
    $id= $_POST['id']; 
    $parent_id= $_POST['parent_id'];

    if( $parent_id === '0'){
        $stmt = $conn->prepare("DELETE FROM yuting_comments WHERE id = ? or parent_id = ? ");
        $stmt->bind_param('ii', $id, $parent_id);
        $result = $stmt->execute();
        $stmt->close();
    }else{
        $stmt = $conn->prepare("DELETE FROM yuting_comments WHERE id = ? ");
        $stmt->bind_param('i', $id);
        $result = $stmt->execute();
        $stmt->close();
    }
    
    if($result){
        $arr = array('result' => 'success','id' => $id,'parent_id'=>$parent_id);
        echo json_encode($arr);
    }
?>