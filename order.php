
<?php 
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'ketnoi.php';
    $query = mysqli_query($conn, "SELECT * FROM orders")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - PetPark</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./font/fontawesome/css/all.css">
</head>
<body>
    <div class="header">
        <h1 class="top">
            Admin - PetPark
        </h1>
    </div>
    <div class="menu">
        <div class="nav">
            <ul>
                <a href="admin.php"><li>Slide_Show</li></a>
                <li class="list">Danh Sách Thú Cưng
                    <div class="drop">
                        <a href="dsdv.php?ten_loai=cho">Danh Sách Chó</a>
                        <a href="dsdv.php?ten_loai=meo">Danh Sách Mèo</a>
                        <a href="dsdv.php?ten_loai=thukieng">Danh Sách Thú Cưng Khác</a>
                    </div>
                </li>
                <a href=""><li>Dịch Vụ Thú Cưng</li></a>
                <a href="order.php"><li>Quản lý đơn hàng</li></a>
            </ul>
        </div>
    </div>
    <div class="main">
    <div class="card-body">
            <table class="table">
                <!-- <div class="table-container">
                    <a class="table-a" href="them_slide.php">Thêm Mới</a>
                </div> -->
                
                <thead class="thead-light">
                    <tr>
                        <div class="thead-item">
                            <th scope="col" class="table-stt back">STT</th>
                            <th scope="col" class="table-name back">Tên người đặt</th>
                            <th scope="col" class="table-phone back">Số điện thoại</th>
                            <th scope="col" class="table-email back">Email</th>
                            <th scope="col" class="table-adress back">Địa chỉ nhận hàng</th>
                            <th scope="col" class="table-note back">Ghi chú</th>
                            <th scope="col" class="table-total back">Tổng tiền</th>
                            <th scope="col" class="table-time back">Thời gian đặt hàng</th>
                            <th scope="col" class="table-in back">Xuất đơn</th>
                        </div>
                    </tr>
                </thead>
                <tbody>
                <?php
                        $i=1;
                        while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        <td class="orders-card"><p><?php echo $row['name_orders']; ?></p></td>
                        <td class="orders-card"><p><?php echo $row['phone']; ?></p></td>
                        <td class="orders-card"><p><?php echo $row['email']; ?></p></td>
                        <td class="orders-card"><p><?php echo $row['adress']; ?></p></td>
                        <td class="orders-card"><p><?php echo $row['note']; ?></p></td>
                        <td class="orders-card"><p><?php echo number_format($row['total'],0,'','.'); ?><span>đ</span></p></td>
                        <td class="orders-card"><p><?=date('d/m/Y H:i', $row['time']); ?></p></td>
                        <td><a class="orders-in" href="chitietdonhang.php?id=<?= $row['id']; ?>"><p>IN</p></a></td>
                    </tr>
                        <?php }?>
                </tbody>
            </table>
            </div>
    </div>
</div>
    </div>
<script>
    function Del(name){
        return confirm("Bạn có chắc chắn muốn xóa Thú Cưng: " + name + "?"); 
    }
</script>
</body>
</html>