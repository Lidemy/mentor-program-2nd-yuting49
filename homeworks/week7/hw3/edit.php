<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="./board.CSS" />
    </head>
    <h2 class="intro">編輯留言</h2>
    <a href="./index.php" >回首頁</a>
</html>

<?php
include_once("./conn.php");
$id=$_POST['id'];
//取出原先的值
$sql="SELECT * FROM yuting_comments WHERE id = $id";
$result = $conn->query($sql);
if($result){
    while($row = $result->fetch_assoc()){
//供使用者更改後送出
?>
    <form class="newcomments" action="edit_comments.php" method="POST">
        <input type='hidden' value=<?php echo $row['id'] ?> name="id" />
        <textarea name="comment" class="comments_size"><?= $row['comment']?></textarea>
        <br>
            <input type="submit" name="submit" value="送出" class="submit">
    </form>       
<?php
    }}
//更改資料庫得值

?>