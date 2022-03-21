<?php 
    include './ketnoi.php';
?>

<div class="header">
    <h1>Hệ thống cửa hàng PetMark</h1>
</div>
<div class="logo">
    <a href="./index.php"><img src="./img/Logo.png" title="Shop PetPark"></a>
    <div class="search">
        <form action="#" method="post" class="search_form">
            <input type="text" class="search_input" name="search_id" placeholder="Tìm Kiếm...">
            <button type="submit" name="search_sbm" class="search_btn">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div> 
    <div class="cart">
        <a href="giohang.php">Giỏ hàng <i class="fas fa-shopping-cart"></i></a>
        <p class="number-cart">
        0
        </p>
    </div>
    <div class="login-container">
        <?php       
            if(isset($_SESSION['username'])){?>
                <div class="hello-item">
                    <p class="hello"><span>Xin chào</span> <?php echo $_SESSION['username']; ?></p>
                </div>
                <div class="logout-item">
                    <a href="logout.php" class="logout">Đăng xuất</a>
                </div>
                <div class="order-user">
                    <?php
                        $result_user_chitiet = mysqli_query($conn, "SELECT * FROM user WHERE id_user = ".$_SESSION['id']."");
                        $row_user_chitiet = mysqli_fetch_array($result_user_chitiet);
                    ?>
                    <a href="chitietdonhanguser.php?id_khachhang=<?php echo $row_user_chitiet['id_user'];?>">Chi tiết đơn hàng</a>
                </div>
            <?php }else {?>
                <div class="login_logout">
                    <a href="#" class="sign_up js-sign-up">Đăng ký</a>
                    <a href="#" class="log_in js-log-in">Đăng nhập</a>
                </div>
            <?php } ?>
    </div>
</div>
<div class="menu-main">
    <ul class="nav-item">
        <li><a href="index.php">Trang chủ</a></li>
        <li><a href="listdv.php?ten_loai=cho">Chó con</a></li>
        <li><a href="listdv.php?ten_loai=meo">mèo con</a></li>
        <li><a href="listdv.php?ten_loai=thukieng">Thú kiểng khác</a></li>
        <li><a href="">Dịch Vụ Thú Cưng</a></li>
        <li><a href="">tin tức thú cưng</a></li>
    </ul>
    <div class="nav-icon">
        <i class="fab fa-facebook-square icon-item"></i>
        <i class="fab fa-instagram icon-item"></i>
        <i class="fab fa-youtube icon-item"></i>
    </div>
</div>