<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./font/fontawesome/css/all.css">
</head>
<body>
    <?Php 
        session_start();
        include './ketnoi.php';
        $id = $_GET['id'];
        $query =mysqli_query($conn, "SELECT orders.name_orders, orders.adress, orders.phone, orders.email, orders.note, orders_detail.*, dong_vat.ten_dv FROM orders 
        INNER JOIN orders_detail ON orders.id = orders_detail.id_orders 
        INNER JOIN dong_vat ON dong_vat.id_dv=orders_detail.id_dv 
        WHERE orders.id = '$id'");
        
        $query = mysqli_fetch_all($query, MYSQLI_ASSOC);
    ?>
    <div class="detailed-container">
        <div class="detailed-item">
            <div class="detailed-card">
                <div class="detailed-clo">
                    <h1 class="detailed-h1">Chi tiết đơn hàng</h1>
                    <div class="label-card">
                        <div class="label-container">
                            <div class="detailed-boss">
                                <label class="detailed-label">Người nhận: </label><span><?= $query[0]['name_orders'] ?></span>
                            </div>

                            <div class="detailed-boss">
                                <label class="detailed-label">Điện thoại: </label><span><?= $query[0]['phone'] ?></span>
                            </div>

                            <div class="detailed-boss">
                                <label class="detailed-label">Email: </label><span><?= $query[0]['email'] ?></span>
                            </div>

                            <div class="detailed-boss">
                                <label class="detailed-label">Địa chỉ người nhận: </label><span><?= $query[0]['adress'] ?></span>
                            </div>
                        </div>

                        <div class="label-img">
                            <img src="./img/QR.jpg">
                            <p>QR Code</p>
                        </div>
                    </div>    

                    <div class="list-container">
                        <h3>Danh sách sản phẩm</h3>
                        <ul class="list-ul">
                            <?php  
                                $totalQuanlity = 0;
                                $totalMoney = 0;
                                foreach($query as $row){
                                    ?>
                                        <li>
                                            <span><?= $row['ten_dv'] ?></span>
                                            <span> - SL: <?= $row['quanlity'] ?> Sản phẩm</span>
                                        </li>
                                    <?php
                                    $totalMoney += ($row['price'] * $row['quanlity']);
                                    $totalQuanlity += $row['quanlity'];
                                }
                            ?>
                        </ul>
                    </div>

                    <div class="total-container">
                        <label class="total">Tổng số lượng:</label> <?= $totalQuanlity ?> - <label>Tổng tiền:</label> <?= number_format($totalMoney,0,'','.'); ?><span>đ</span>
                        <p><label class="total">Ghi chú:</label><?= $query[0]['note']?></p>
                    </div>    
                </div>
            </div>
        </div>
    </div>

     
</body>
</html>