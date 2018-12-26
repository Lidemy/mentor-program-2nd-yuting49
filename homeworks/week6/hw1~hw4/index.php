<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>留言板首頁</title>
        <link rel="stylesheet" href="./board.CSS" />
    </head>  
    <body>
        <?php 
            include_once('./navbar.php');
            include_once('./check_login.php');
            include_once('./conn.php');
            function escape($str){
                return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
            }
        ?>
        <?php
            if($user){
        ?>
            <div class="intro">
                <h3><?php  echo "Hello, $user " ?> </h3> 
                <h3>歡迎使用留言板</h3>
            </div>
        <?php
            } else {
        ?>
            <div class="intro">
                <h3>請先註冊或登入會員，才能留言</h3>
                <h3>訪客身份只能夠瀏覽，無法留言</h3>
            </div>
        <?php 
            }
        ?>
        <?php
            $page = 1;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $page = (int) $_GET['page'];
            }
            $size = 10;
            $start = $size * ($page - 1);
            
            $count_sql = "SELECT count(*) as count FROM yuting_comments where parent_id=0";
            $count_result = $conn->query($count_sql);
            if ($count_result && $count_result->num_rows > 0) {
                $count = $count_result->fetch_assoc()['count'];
                $total_page = ceil($count / $size);
                echo '<div class="page ">page';
                for($i=1; $i<=$total_page; $i++) {
                    echo "<a href='./index.php?page=$i'>$i</a>";
                }
                echo '</div>';
            }
        ?> 
        <form class="newcomments" action="add_comments.php" method="POST">
            <input type='hidden' value="0" name="parent_id" />
            <input type='hidden' value=<?php echo $user ?> name="username" />
            <div><?php  echo "$user"."：" ?> </div>
            <textarea name="comment" class="comments_size" placeholder="嗨，今天過得好嗎？"></textarea>
            <br>
            <?php   if($user){  ?>
                <input type="submit" name="submit" value="新增留言" class="submit">
            <?php   } else {    ?>
                <span class="submit">請先註冊或登入會員，才能留言</span> 
            <?php  }    ?>
        </form>       
        <?php //從資料庫取主留言資料
            $sql =" SELECT c.username, c.id, c.comment, c.created_at, u.nickname 
            FROM `yuting_comments` AS c 
            LEFT JOIN yuting_users AS u ON c.username = u.username 
            WHERE parent_id = 0
            ORDER BY created_at DESC
            LIMIT $start, $size ";
            $result = $conn->query($sql);
            if($result){
                while($row = $result->fetch_assoc()){ //顯示主留言
        ?>
                    <div class='container'>
                        <div class="comments">
                            <div class="content">留言時間：<?= $row['created_at']?></div>
                            <div class="content">作者：<?= escape($row['nickname'])?> </div>
                            <div class="content">內容：<?= escape($row['comment'])?></div>
                            
                    <?php if($row['username']==$user && $token){
                        ?>
                        <form  action="edit.php" method="POST">
                            <input type='hidden' value=<?php echo escape($row['id']) ?> name="id" />
                            <input type="submit" name="submit" value="編輯" class="change">
                        </form>
                        <form  action="delete.php" method="POST">
                            <input type='hidden' value=<?php echo escape($row['id']) ?> name="id" />
                            <input type="submit" name="submit" value="刪除" class="change">
                        </form>
                        <?php
                        //<a href="./delete.php" >刪除</a>
                        echo "</div>";
                    }else{
                        echo "</div>";
                    }
//子留言
                    $parent_id = $row['id'];
                    $sql_sub = " SELECT c.username, c.parent_id, c.comment, c.created_at, u.nickname 
                    FROM `yuting_comments` AS c 
                    LEFT JOIN yuting_users AS u ON c.username = u.username
                        WHERE c.parent_id = $parent_id
                        ORDER BY c.created_at ASC ";
                    $result_sub = $conn->query($sql_sub);
                    if ($result_sub) { //如果query成功
                        while($row_sub = $result_sub->fetch_assoc()) { //如果有撈到資料
                            if($row_sub['username']==$row['username']){
                            ?>
                                <div class="personal">
                                    <div class="content">留言時間：<?= $row_sub['created_at']?></div>
                                    <div class="content">作者：<?= escape($row_sub['nickname'])?> </div>
                                    <div class="content">內容：<?= escape($row_sub['comment'])?></div>
                            <?php
                                if($row_sub['username']==$user){
                            ?>
                                    <form  action="edit.php" method="POST">
                                        <input type='hidden' value=<?php echo escape($row['id']) ?> name="id" />
                                        <input type="submit" name="submit" value="編輯" class="change">
                                    </form>
                                    <form  action="delete.php" method="POST">
                                        <input type='hidden' value=<?php echo escape($row['id']) ?> name="id" />
                                        <input type="submit" name="submit" value="刪除" class="change">
                                    </form>
                            <?php   }    
                            ?>     
                                </div>
                            <?php
                            }else{
                                ?>
                                    <div class="sub_comments">
                                    <div class="content">留言時間：<?= $row_sub['created_at']?></div>
                                    <div class="content">作者：<?= escape($row_sub['nickname'])?> </div>
                                    <div class="content">內容：<?= escape($row_sub['comment'])?></div>
                            <?php    
                                if($row_sub['username']==$user){
                            ?>
                                    <form  action="edit.php" method="POST">
                                        <input type='hidden' value=<?php echo escape($row['id']) ?> name="id" />
                                        <input type="submit" name="submit" value="編輯" class="change">
                                    </form>
                                    <form  action="delete.php" method="POST">
                                        <input type='hidden' value=<?php echo escape($row['id']) ?> name="id" />
                                        <input type="submit" name="submit" value="刪除" class="change">
                                    </form> 
                                </div>
    <?php                       }else{
                                echo   "</div>" ;
                    }   }   }   } ?>
                        <form class="reply" action="add_comments.php" method="POST">
                            <input type='hidden' value="<?php echo $parent_id; ?>" name="parent_id" />
                            <div><?php  echo "$user"."：" ?></div>
                            <textarea name="comment" class="reply_size" ></textarea>
                            <br>
                            <?php   if($user){    ?>
                                <input type="submit" name="submit" value="回覆" class="submit">
                            <?php   } else {     ?>
                                <span class="submit">請先註冊或登入會員，才能留言</span> 
                            <?php   }    ?>
                        </form>
                    </div>
                <?php   } }   ?>   
    </body>
</html>