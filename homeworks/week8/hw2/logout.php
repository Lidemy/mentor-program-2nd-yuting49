<?php
//改用Session
    session_start();    
    session_destroy();
?>
    <script>
        alert('已為您登出！');
        window.location = './index.php'
    </script>
