<?php
    session_start();
    include_once('./navbar.php');
    include_once('./conn.php');
    function escape($str){
        return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
        <link rel='stylesheet' href='./board.CSS' />
    </head>
    <body>
        <h2 class='intro'>編輯留言</h2>
    <?php    
        $id=$_POST['id'];
        $stmt = $conn->prepare("SELECT * FROM yuting_comments WHERE id = ? ");
        $stmt->bind_param("i", $id );
        $stmt->execute();
        $result = $stmt->get_result();

        if($result){
            while($row = $result->fetch_assoc()){
?>
                <div class='container'>
                    <form class='newcomments add comment' action='edit_comments.php' method='POST'>
                        <input type='hidden' value=<?= escape($row['id']) ?> name='id' />
                        <textarea name='comment' class='comments_size add_input'><?= escape($row['comment'])?></textarea>
                        <br>
                        <input type='submit' name='submit' value='送出' class='btn btn-warning'>
                    </form>  
                </div>     
<?php
        }
    }
?>
    </body>
</html>
