<?
    require_once('./conn.php');
    
    $conn->autocommit(FALSE);
    $conn->begin_transaction();
    $is_success = true;

    $stmt1 = $conn->prepare("SELECT * FROM yuting_products WHERE id = 1" );
    $stmt1->execute();
    $result1 = $stmt1->get_result();
    if($result1->num_rows > 0){
        $row1 = $result1->fetch_assoc();
        echo $row1["title"].":".$row1["quantity"];
        
        if($row1["quantity"] > 0){ 
            $stmt1_1 = $conn->prepare("UPDATE yuting_products SET quantity = quantity-1  WHERE id = 1 ");
            if ($stmt1_1->execute()){
                echo " 購買成功";
            }else{
                echo " 購買失敗";
            }
        }else{
            echo " 庫存不足";
            $is_success = false;
        }
    }
    echo "<br>";
    $stmt2 = $conn->prepare("SELECT * FROM yuting_products WHERE id = 2 " );
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    if($result2->num_rows > 0){
        $row2 = $result2->fetch_assoc();
        echo $row2["title"].":".$row2["quantity"];
        if($row2["quantity"] > 0){ 
            $stmt2_1 = $conn->prepare("UPDATE yuting_products SET quantity = quantity-1  WHERE id = 2");
            if ($stmt2_1->execute()){
                echo " 購買成功";
            }else{
                echo " 購買失敗";
            }
        }else{
            $is_success = false;
            echo " 庫存不足";
        }
    }
    echo "<br>";
    $stmt3 = $conn->prepare("SELECT * FROM yuting_products WHERE id = 3 " );
    $stmt3->execute();
    $result3 = $stmt3->get_result();
    if($result3->num_rows > 0){
        $row3 = $result3->fetch_assoc();
        echo $row3["title"].":".$row3["quantity"];
        if($row3["quantity"] > 0){ 
            $stmt3_1 = $conn->prepare("UPDATE yuting_products SET quantity = quantity-1  WHERE id = 3 ");
            if ($stmt3_1->execute()){
                echo " 購買成功";
            }else{
                echo " 購買失敗";
            }
        }else{
            $is_success = false;
            echo " 庫存不足";
        }
    }
    echo "<br>";
    if( $is_success === false){
        $conn->rollback();
        echo "本次交易失敗";
    }else{
        $conn->commit();
        echo "本次交易完成";
    }
?>