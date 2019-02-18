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
        <meta charset='UTF-8'/>
        <title>留言板首頁</title>
        <script src='https://code.jquery.com/jquery-3.1.1.min.js'></script>
        <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css' integrity='sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS' crossorigin='anonymous'>
        <link rel='stylesheet' href='./board.CSS' />
    </head>
    <script>
        $(document).ready(function(){
            //新增留言
            $('form.newcomments').submit(function(e){
                e.preventDefault();
                const comments = escape($(e.target).find('textarea[name=comment]').val())
                const parentid = escape($(e.target).find('input[name=parent_id]').val())
                const username = escape($(e.target).find('input[name=username]').val())
                const time = new Date()
                
                if (comments === '') {
                    alert("請輸入內容再提交！");
                    return false;
                }

                $.ajax({
                type: 'POST',
                url: './add_comments.php',
                data: {
                    username: username,
                    comment: comments, 
                    parent_id: parentid
                },
                success: function(resp){
                    var res = JSON.parse(resp)
                    if (res.result === 'success') {  
                        $('.allcomments').first().prepend(`
                        <div class=' eachcomment'>
                            <input type='hidden'  name='postname' value=${username} >
                            <div class='comments comment'>
                                <div class='content'>時間：${time}</div>
                                <div class='content'>作者：${username}</div>
                                <div class='content'>內容：${comments}</div>
                                
                                <form  class="edit" action='edit.php' method='POST'>
                                    <input type='hidden' value='${res.id}' name='id' />
                                    <input type='submit' name='submit' value='編輯' class='btn btn-sm btn-secondary btn-edit'>
                                </form>
                                <form  class='delete' action='delete.php' method='POST'>
                                    <input type='hidden' value='${res.id}' name='id' />
                                    <input type='hidden' value='0' name='parent_id' />
                                    <input type='submit' name='submit' value='刪除' class='btn btn-sm btn-danger btn-delete'>
                                </form>
                            </div>
                            
                            <div>
                                    <input type='hidden' class='sub_comment personal'/>
                                    <form class='add_reply reply' action='add_comments.php' method='POST'>
                                        <input type='hidden' value='${res.id}' name='parent_id'/>
                                        <input type='hidden' value='${username}' name='username'/>
                                        <textarea name='comment' class='form-control' placeholder='我要回覆'></textarea>
                                        <input type='submit' name='submit' value='回覆' class='btn btn-warning'>  
                                    </form>
                                </div>
                        </div>
                        `)
                        $(e.target).find('textarea[name=comment]').val('')
                    } else {
                        alert('error')
                    }
                },
                error: function(resp){
                    console.log("error",resp)
                    alert("發生錯誤，請再試一次")
                }
                });
            });
            //回覆留言
            $('form.reply').submit(function(e){
                e.preventDefault();
                const comments = escape($(e.target).find("textarea[name=comment]").val())
                const parentid = escape($(e.target).find("input[name=parent_id]").val())
                const username = escape($(e.target).find("input[name=username]").val())
                const postname = escape($(e.target).parent().find("input[name=postname]").val())
                const time = new Date()
                
                if (comments === '') {
                    alert("請輸入內容再提交！");
                    return false;
                }
                $.ajax({
                type: 'POST',
                url: './add_comments.php',
                datatype: 'json',
                data: {
                    username: username,
                    comment: comments, 
                    parent_id: parentid,
                    postname: postname
                },
                
                success: function(resp) {
                    var res = JSON.parse(resp)
                    var id = res.id
                    if (res.result === 'success') {  
                        if (res.if_same_author) {
                            $(e.target).prepend(`
                            <div class="personal sub_comment">
                                <div class="content">時間：${time}</div>
                                <div class="content">作者：${username}</div>
                                <div class="content">內容：${comments}</div>
                                <form  class="edit" action="edit.php" method="POST">
                                    <input type="hidden" value="${id}" name="id" />
                                    <input type="submit" name="submit" value="編輯" class="btn btn-sm btn-secondary btn-edit">
                                </form>
                                <form  class="delete" action="delete.php" method="POST">
                                    <input type="hidden" value="${id}" name="id" />
                                    <input type='hidden' value="${parentid}" name="parent_id" />
                                    <input type="submit" name="submit" value="刪除" class="btn btn-sm btn-danger btn-delete">
                                </form>
                            </div>
                            `)  
                        } else {
                            $(e.target).prepend(`
                            <div class="sub_comment">
                                <div class="content">時間：${time}</div>
                                <div class="content">作者：${username}</div>
                                <div class="content">內容：${comments}</div>
                                <form  class="edit" action="edit.php" method="POST">
                                    <input type="hidden" value="${id}" name="id" />
                                    <input type="submit" name="submit" value="編輯" class="btn btn-sm btn-secondary btn-edit">
                                </form>
                                <form  class="delete" action="delete.php" method="POST">
                                    <input type="hidden" value="${id}" name="id" />
                                    <input type='hidden' value="${parentid}" name="parent_id" />
                                    <input type="submit" name="submit" value="刪除" class="btn btn-sm btn-danger btn-delete">
                                </form>
                            </div>
                            `) 
                        }
                        $(e.target).find("textarea[name=comment]").val('') 
                    } else {
                        alert('error!')
                    }
                },
                error: function(resp){
                    console.log(resp)
                    }
                });
            });
            //刪除留言
            $('form.delete').submit(function(e){
                e.preventDefault();
                const id = escape($(e.target).find("input[name=id]").val())
                const parent_id = escape($(e.target).find("input[name=parent_id]").val())
                $.ajax({
                type: 'POST',
                url: './delete.php',
                dataType: "json",
                data: {
                    id: id,
                    parent_id: parent_id
                },
                success: function(resp){
                    var res = resp
                    var delete_comment = $("div:contains(res.id)")

                    if (res.result === 'success') { 
                        if(res.parent_id === '0'){
                            $(e.target).parent().parent().remove()
                        } else {
                            $(e.target).parent().remove()
                        }
                    } else {
                        alert('error')
                    }
                },
                error: function(resp){
                    console.log("error",resp)
                }
                });
            });
        });
    </script> 
    <body>

    <?php
        //this is intro
        if ($_SESSION['username']) {
    ?>
            <div class='container intro'> 
                <h4>歡迎留下任何想說的話，想問問題也可以</h4>
                <h4>Now you can leave message or ask question here.</h4>
            </div>
        <?php
        } else {
        ?>
            <div class='container intro'>
                <h4>請先註冊或登入帳號，讓我們知道是誰在說話</h4>
                <h4>Please register or login to leave message.</h4>
            </div>
        <?php 
        }
            //頁碼
            $page = 1;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $page = (int) $_GET['page'];
            }
            $size = 10;
            $start = $size * ($page - 1);
            $sql = "SELECT COUNT(*) as count FROM yuting_comments where parent_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('i', $a=0);//一定要放變數
            $stmt->execute();
            $count_result = $stmt->get_result();
            $stmt->close();

            $tmp_page = 1;
            if (isset($_GET['page']) && !empty($_GET['page'])) {
                $tmp_page = (int) $_GET['page'];
            }

            if ($count_result && $count_result->num_rows > 0) {
                $count = $count_result->fetch_assoc()['count'];
                $total_page = ceil($count / $size);
                $previous_num = $tmp_page-1;
                $next_num = $tmp_page+1;
                echo "<nav  class='page'>";
                echo    "<ul class='pagination jcc'>";
                if ($previous_num > 0) {
                    echo    "<li class='page-item'><a class='page-link' href='./index.php?page=$previous_num'>Previous</a></li>";
                } else {
                    echo    "<li class='page-item'><a class='page-link' >Previous</a></li>";
                }
                for ($i = 1; $i <= $total_page; $i++) {
                    echo    "<li class='page-item'><a class='page-link' href='./index.php?page=$i'>$i</a></li>";
                }
                if ($tmp_page < $total_page) {
                    echo    "<li class='page-item'><a class='page-link' href='./index.php?page=$next_num'>Next</a></li>";
                } else {
                    echo    "<li class='page-item'><a class='page-link'>Next</a></li>";
                }
                echo    "</ul>";
                echo "</nav>";
            }
        ?>
        <div class="container">
            <form class="add newcomments" action="add_comments.php" method="POST" >
                <div>    
                    <h3>留言區</h3>
                    <h4><?= $_SESSION['username'] ?>：</h4>
                    <textarea name="comment" class="form-control add_input" placeholder="在想些什麼呢？"></textarea>
                </div>
                <div class="userinfo">
                    <input type='hidden' value="<? escape(0)?>" name="parent_id" />
                    <input type='hidden' value=<?= $_SESSION['username'] ?> name="username" />
                </div>
                <?php       
                if ($_SESSION['username']) {  
                ?>
                    <button type="submit" class="btn btn-warning">送出</button>
                <?php       
                } else {    
                ?>
                    <span class="btn btn-warning">請先註冊或登入會員，才能留言</span> 
                <?php       
                }    
                ?>
            </form> 
        </div>         
        <?php 
            $stmt = $conn->prepare("SELECT c.username, c.id, c.comment, c.created_at, u.nickname 
            FROM `yuting_comments` AS c LEFT JOIN yuting_users AS u ON c.username = u.username 
            WHERE parent_id = ? ORDER BY created_at DESC LIMIT ?,? ");
            $stmt->bind_param("iss", $a=0, $start, $size);
            $stmt->execute();
            $result = $stmt->get_result();

            //從資料庫取主留言資料
            $sql =" SELECT c.username, c.id, c.comment, c.created_at, u.nickname 
            FROM `yuting_comments` AS c 
            LEFT JOIN yuting_users AS u ON c.username = u.username 
            WHERE parent_id = 0
            ORDER BY created_at DESC
            LIMIT $start, $size ";
            $result = $conn->query($sql);

            if ($result) {
                while ($row = $result->fetch_assoc()) { //顯示主留言
        ?>
                <div  class="allcomments container">
                    <div class='eachcomment'>
                        <input type='hidden'  name='postname' value=<?= escape($row['username'])?> >
                        <div class="comments comment">
                            <div class="content">留言時間：<?= escape($row['created_at'])?></div>
                            <div class="content">作者：<?= escape($row['username'])?> </div>
                            <div class="content">內容：<?= escape($row['comment'])?></div>
                            
                            <?php   
                            //給編輯刪除        
                            if ($row['username'] == $_SESSION['username']) {
                            ?>
                                <form  class="edit" action="edit.php" method="POST">
                                    <input type='hidden' value=<?= escape($row['id']) ?> name="id" />
                                    <input type="submit" name="submit" value="編輯" class="btn btn-sm btn-secondary btn-edit">
                                </form>
                                <form  class="delete" action="delete.php" method="POST">
                                    <input type='hidden' value=<?= escape($row['id']) ?> name="id" />
                                    <input type='hidden' value=<? escape(0)?> name="parent_id" />
                                    <input type="submit" name="submit" value="刪除" class="btn btn-sm btn-danger btn-delete">
                                </form>
                <?php
                        echo"</div>";//comments
                            } 
                        //子留言
                        $parent_id = $row['id'];
                        $stmt = $conn->prepare("SELECT c.id, c.username, c.parent_id, c.comment, c.created_at, u.nickname 
                        FROM `yuting_comments` AS c LEFT JOIN yuting_users AS u ON c.username = u.username
                        WHERE c.parent_id = ? ORDER BY c.created_at ASC");
                        $stmt->bind_param("i", $parent_id);
                        $stmt->execute();
                        $result_sub = $stmt->get_result();

                        if ($result_sub) { 
                            while ($row_sub = $result_sub->fetch_assoc()) { //如果有撈到資料
                                if ($row_sub['username'] == $row['username']) {//如果主留言和子留言同作者
                                    //放個人化的回覆
                ?>
                                    <div class="personal">
                                        <div class="content">留言時間：<?= escape($row_sub['created_at'])?></div>
                                        <div class="content">作者：<?= escape($row_sub['username'])?> </div>
                                        <div class="content">內容：<?= escape($row_sub['comment'])?></div>
                                        <?php 
                                        if ($row_sub['username'] == $_SESSION['username']) {
                                        //給編輯刪除
                                        ?>
                                            <form class="edit" action="edit.php" method="POST">
                                                <input type='hidden' value=<?= escape($row_sub['id']) ?> name="id" />
                                                <input type="submit" name="submit" value="編輯" class="btn btn-sm btn-secondary btn-edit">
                                            </form>
                                            <form  class="delete" action="delete.php" method="POST">
                                                <input type='hidden' value=<?= escape($row_sub['id']) ?> name="id" />
                                                <input type='hidden' value="<?= escape($row_sub['parent_id']) ?>" name="parent_id" />
                                                <input type="submit" name="submit" value="刪除" class="btn btn-sm btn-danger btn-delete">
                                            </form>
                                        <?php                   
                                        }
                                    echo "</div>";//personal               
                                } else {  //一般的回覆
                                ?>
                                    <div class="sub_comment">
                                        <div class="content">留言時間：<?= escape($row_sub['created_at'])?></div>
                                        <div class="content">作者：<?= escape($row_sub['username'])?> </div>
                                        <div class="content">內容：<?= escape($row_sub['comment'])?></div>
                                        <?php                   
                                        if ($row_sub['username']==$_SESSION['username']) {
                                        //給編輯刪除
                                        ?>
                                            <form  class="edit" action="edit.php" method="POST">
                                                <input type='hidden' value=<?= escape($row['id']) ?> name="id" />
                                                <input type="submit" name="submit" value="編輯" class="btn btn-sm btn-secondary btn-edit">
                                            </form>
                                            <form  class="delete" action="delete.php" method="POST">
                                                <input type='hidden' value=<?= escape($row['id']) ?> name="id" />
                                                <input type='hidden' value="<?= escape($row_sub['parent_id']) ?>" name="parent_id" />
                                                <input type="submit" name="submit" value="刪除" class="btn btn-sm btn-danger btn-delete">
                                            </form>  
                    <?php               
                                        }              
                                    echo"</div>";//sub_comment
                                }
                            }
                        }
                    ?>
                        <form class="reply add_reply" action="add_comments.php" method="POST">
                            <input type='hidden' value="<?= escape($parent_id); ?>" name="parent_id" />
                            <input type='hidden' value=<?= escape($_SESSION['username']) ?> name="username" />
                            <textarea name="comment" class="form-control" placeholder="我要回覆"></textarea>
                            <br>
                            <?php               
                            if ($_SESSION['username']) {    
                            ?>
                                <input type="submit" name="submit" value="回覆" class="btn  btn-warning">
                            <?php               
                            } else {     
                            ?>
                                <span class="btn  btn-warning">請先註冊或登入會員，才能留言</span> 
    <?php               
                            }   
                        echo "</form>";
                        echo "</div>";               
                    echo "</div>";//eachcomment
                }
            }  
                echo "</div>";//allcomments
    ?> 
    </body>
</html>
