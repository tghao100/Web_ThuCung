<?php 
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'ketnoi.php';
    $ten_loai=$_GET['ten_loai'];
    $query = mysqli_query($conn, "SELECT * FROM loai_dv, dong_vat  WHERE dong_vat.id_loai_dv=loai_dv.id_loai_dv and dong_vat.ten_loai='$ten_loai' order by dong_vat.id_dv DESC");
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
                <div class="table-container">
                    <a class="table-a" href="them_dv.php">Thêm Mới</a>
                </div>
                <thead class="thead">
                    <tr>
                    <th scope="col" class="table-stt back">STT</th>
                    <th scope="col" class="table-img back">Hình Ảnh</th>
                    <th scope="col" class="table-animal back">Tên Thú Cưng</th>
                    <th scope="col" class="table-price back">Số lượng</th>
                    <th scope="col" class="table-price back">Giá bán</th>
                    <th scope="col" class="table-species back">Loại</th>
                    <th scope="col" class="table-species-ani back">Giống Loài</th>
                    <th scope="col" class="table-sua back">Sửa</th>
                    <th scope="col" class="table-xoa back">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i=1;
                        while($row=mysqli_fetch_array($query)){
                        ?>
                        <tr>
                        <td><?php echo $i++; ?></td>
                        
                        <td>
                            <img class="slide-img" src="./img/<?php echo $row['hinhanh'];?>">

                        </td>
                        <td><p class="slide-p"><?php echo $row['ten_dv']; ?></p></td>
                        <td><p class="slide-dog"><?php echo $row['quanlity']; ?></p></td>
                        <td><p class="slide-dog"><?php echo $row['price']; ?></p></td>
                        <td><p class="slide-dog"><?php echo $row['ten_loai']; ?></p></td>
                        <td><p class="slide-dog"><?php echo $row['ten_loai_dv']; ?></p></td>
                        <td><a class="xoa" href="sua_dv.php?id_dv=<?php echo $row['id_dv']; ?>"><p>Sửa</p></a></td>
                        <td>
                            <a class="xoa" onclick="return Del('<?php echo $row['ten_dv'];?>')" href="xoa_dv.php?id_dv=<?php echo $row['id_dv']; ?>"><p>Xóa</p></a>
                        </td>
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