<?php
    include_once('conn.php');
/*    function getUserByToken($conn, $token){
        if( isset($token) && !empty($token)){
            $sql = "SELECT * FROM yuting_certificates WHERE token ='$token'";
            $result = $conn->query($sql);
            if(!$result || $result->num_rows<=0){
                return null;
            }
            $row = $result->fetch_assoc();
            return $row['username'];
        }else{
            return null;
        }
    }
*/    
    if( isset($_COOKIE['token']) && !empty($_COOKIE['token']) ){
        $token = $_COOKIE['token'];
        $sql = "SELECT * FROM yuting_certificates WHERE token ='$token'";
        $result = $conn->query($sql);
        $user = $_COOKIE['username'];
        if(!$result || $result->num_rows<=0){
            $user = null;
        }else{
            $row = $result->fetch_assoc();
            $user = $row['username'];
        }
    }else{
        $user = null;
    }

?>