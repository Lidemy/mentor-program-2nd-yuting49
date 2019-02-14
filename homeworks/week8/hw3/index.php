
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>week8 hw3</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="./shop.CSS" />
    </head>  
    <body>
        <?php include_once("./navbar.php")?>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                    <img src="./ob1.jpg" class="d-block " height="373" width="664" >
                    </div>
                    <div class="carousel-item">
                    <img src="./ob2.jpg" class="d-block " height="373" width="664" >
                    </div>
                    <div class="carousel-item">
                    <img src="./ob3.jpeg" class="d-block " height="373" width="664">
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


        </div> 
        <div class='row'> 
            <?php
                require_once('./conn.php');
                $sql = "SELECT * FROM yuting_products ";
                $result = $conn->query($sql);
                if($result->num_rows >0){
                    while($row = $result->fetch_assoc()){
                        echo "<div class='product'>";
                        echo    "<img src='" .$row['imageurl']. "' class='cover' >";
                        echo    "<div class='description'>";
                        echo        "<div>商品名稱：".$row['title']."</div>";
                        echo        "<div>售價：".$row['price']."</div>";
                        echo        "<div>庫存：".$row['quantity']."</div>";
                        echo    "</div>";
                        echo    "<button onclick='./addcart.php' class='btn btn-warning'>放入購物車</button>";
                        echo "</div>";
                    }
                }
            ?> 
        </div>
    </body>
</html>