<?php
    setcookie("token", '', time()+3600*24);
    setcookie("username", '', time()+3600*24);
    header('Location: ./index.php');
?>