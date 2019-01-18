<?php
    include_once("./conn.php");  
    if( isset($_COOKIE["token"]) && !empty($_COOKIE["token"]) ){
        $token = $_COOKIE["token"];
        $sql = "SELECT * FROM yuting_certificates WHERE token ='$token'";
        $result = $conn->query($sql);
        $user = $_COOKIE["username"];
        if(!$result || $result->num_rows<=0){
            $user = null;
        }else{
            $row = $result->fetch_assoc();
            $user = $row["username"];
        }
    }else{
        $user = null;
    }

?>