<?php
include_once("./conn.php");

$id= $_POST['id']; 
$sql = "DELETE FROM yuting_comments WHERE id='$id' or parent_id='$id' ";  
if($conn->query($sql)){
?>
    <script>
        alert('刪除成功！');
        window.location = './index.php'
    </script> 
<?php
}else{
?>
    <script>
        alert("Error:" . $conn->error);
        window.location = './index.php'
    </script>
<?php        
}
?>
