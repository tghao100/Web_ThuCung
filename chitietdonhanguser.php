<?php 
    session_start();
    include './ketnoi.php';

    $id_khachhang = $_GET['id_khachhang'];
    $result =mysqli_query($conn, "SELECT orders.name_orders, orders.adress, orders.phone, orders.email, orders.note, orders_detail.*, dong_vat.ten_dv FROM orders 
    INNER JOIN orders_detail ON orders.id = orders_detail.id_orders 
    INNER JOIN dong_vat ON dong_vat.id_dv=orders_detail.id_dv 
    INNER JOIN user ON user.id_user = orders.id_khachhang
    WHERE orders.id_khachhang = '$id_khachhang'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetPark</title>
    <link rel="icon" href="./img/logo.png">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/cacloai.css">
    <link rel="stylesheet" hreflink="./font/fontawesome/css/all.css"> 
    <link rel="stylesheet" href="./font/fontawesome/css/all.min.css">
</head>
<body>
    <?php 
        while ($row = mysqli_fetch_array($result)){?>
            <div class="detailed-boss">
                <label class="detailed-label">Người nhận: </label><span><?= $row['name_orders'] ?></span>
            </div>

            <div class="detailed-boss">
                <label class="detailed-label">Điện thoại: </label><span><?= $row['phone'] ?></span>
            </div>

            <div class="detailed-boss">
                <label class="detailed-label">Email: </label><span><?= $row['email'] ?></span>
            </div>

            <div class="detailed-boss">
                <label class="detailed-label">Địa chỉ người nhận: </label><span><?= $row['adress'] ?></span>
            </div>

            <div class="total-container">
                <p><label class="total">Ghi chú: </label><?= $row['note']?></p>
            </div> 

            <div class="list-container">
                <h3>Danh sách sản phẩm</h3>
                <ul class="list-ul">  
                      $totalQuanlity = 0;  -->
                    <!-- $totalMoney = 0;  -->
                            <li>
                                <span><?= $row['ten_dv'] ?></span>
                                <span> - SL: <?= $row['quanlity'] ?> Sản phẩm</span>
                            </li>   
                    <!-- $totalMoney += ($row['price'] * $row['quanlity']);  -->
                    <!-- $totalQuanlity += $row['quanlity'];  -->
                </ul>
            </div>
    <?php }?>       
</body>
</html>
