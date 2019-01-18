<?php
    include_once("./conn.php");

    $id= $_POST["id"]; 
    $parent_id= $_POST["parent_id"];

    if( $parent_id === "0"){
        $sql = "DELETE FROM yuting_comments WHERE id='$id' or parent_id='$id' "; 
    }else{
        $sql = "DELETE FROM yuting_comments WHERE id='$id' ";
    };

    if($conn->query($sql)){
        $arr = array("result" => "success","id" => $id,"parent_id"=>$parent_id);
        echo json_encode($arr);
    }
?>