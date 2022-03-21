
<?php 
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'ketnoi.php';
    $result_id = mysqli_query($conn, "SELECT * FROM dong_vat, loai_dv  WHERE dong_vat.id_loai_dv=loai_dv.id_loai_dv");
    $row = mysqli_fetch_array($result_id);                
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
    <link rel="stylesheet" href="./font/fontawesome/css/all.css">
    <link rel="stylesheet" href="./font/fontawesome/css/all.min.css">
</head>
<body>
    <div class=boss>
        <?php require './header.php'; ?>
        <div class="big">
            <div class="big-main">
                <div class="main">
                    <div class="danhmuc">
                        <h1 class="list_icon"><i class="fas fa-list-alt"></i> Danh Mục</h1>
                        <ul class="list-item">
                            <li><a href="">Chó con</a></li>
                            <li><a href="">Mèo con</a></li>
                            <li><a href="">Thú Kiểng Khác</a></li>
                            <li><a href="">FaceBook</a></li>
                            <li><a href="">Instagram</a></li>
                            <li><a href="">Youtube</a></li>
                        </ul>
                    </div>
                    <div class="slide_show">
                        <div class="slide_action">
                            <?php 
                                $result = mysqli_query($conn, "SELECT * FROM slide_show") or die ("Lỗi truy vấn");
                                while ($r = mysqli_fetch_array($result)){
                            ?>
                                    <div class="slide">
                                        <img src="./img/<?php echo $r['hinhanh']; ?>" title="<?php echo $r['tenthucung']; ?>">
                                    </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="infor">
                        <ul class="infor-container">
                            <li><i class="fas fa-bullhorn"></i><p>Bảo Hành 2 Năm</p></li>
                            <li><i class="fas fa-headset"></i><p>Hỗ Trợ 24/7</p></li>
                            <li><i class="fas fa-user-md"></i><p>An Toàn Sức Khỏe</p></li>
                            <li><i class="fas fa-shipping-fast"></i><p>Free Ship Toàn Quốc</p></li>
                            <div class="hotline-item">
                                <div class="hotline-container">
                                    <i class="fas fa-user-astronaut"></i>
                                    <p>Hotline: <h2>1900 1547</h2></p>
                                    <p>Thanks!</p>
                                </div>
                            </div>
                        </ul>
                    </div> 
                </div>
                <div class="dog-container">
                    <div class="dog-h1" id="dog">
                        <h1> Cún Con Tiêu Biểu</h1>
                    </div>  

                    <div class="dog-boss">
                        <div class="dog-item">              
                            <?php   
                                $item_page = !empty($_GET['per_page'])?$_GET['per_page']:4;
                                $current_page = !empty($_GET['page'])?$_GET['page']:1;
                                $offset = ($current_page - 1) * $item_page;
                                $result_id = mysqli_query($conn, "SELECT * FROM dong_vat, loai_dv  WHERE dong_vat.id_loai_dv=loai_dv.id_loai_dv and dong_vat.ten_loai='cho' ORDER BY `id_dv` ASC LIMIT ".$item_page." OFFSET ".$offset."");
                                $totalRecords = mysqli_query($conn, "SELECT * FROM dong_vat WHERE dong_vat.ten_loai='cho'");
                                $totalRecords = $totalRecords -> num_rows;
                                $totalPages = ceil($totalRecords / $item_page); 
                                while ($row = mysqli_fetch_array($result_id)){
                            ?>
                                    <div class="dog-img">
                                        <a href="chitietthucung.php?id_dv=<?php echo $row['id_dv']; ?>"><img class="img" src="./img/<?php echo $row['hinhanh']; ?>"></a>
                                        <p class="text-boss">
                                            <a href="chitietthucung.php?id_dv=<?php echo $row['id_dv']; ?>"><?php echo $row['ten_dv']?></a>
                                        </p>
                                    </div>      
                            <?php } ?> 
                            <div class="page-container">  
                                <?php for($num = 1; $num <= $totalPages; $num++){ ?>
                                    <?php if($num != $current_page) {?>
                                        <div class="per-page">
                                            <a href="?per_page=<?=$item_page?>&page=<?=$num?> #dog" class="per-page-item"><?=$num?></a>
                                        </div>
                                    <?php }else{?>
                                        <span class="current-item"><?=$num?></span>
                                    <?php }?>
                                <?php }?>   
                            </div>     
                        </div>  
                    </div>
   
                    <div class="dog-h1" id="cat">
                        <h1> Mèo Con Tiêu Biểu</h1>
                    </div>                
                    
                    <div class="dog-boss">
                        <div class="dog-item">              
                            <?php   
                                $item_page_cat = !empty($_GET['per_page_cat'])?$_GET['per_page_cat']:4;
                                $current_page_cat = !empty($_GET['page_cat'])?$_GET['page_cat']:1;
                                $offset_cat = ($current_page_cat - 1) * $item_page_cat;
                                $result_id = mysqli_query($conn, "SELECT * FROM dong_vat, loai_dv  WHERE dong_vat.id_loai_dv=loai_dv.id_loai_dv and dong_vat.ten_loai='meo' ORDER BY `id_dv` ASC LIMIT ".$item_page_cat." OFFSET ".$offset_cat."");
                                $totalRecords_cat = mysqli_query($conn, "SELECT * FROM dong_vat WHERE dong_vat.ten_loai='meo'");
                                $totalRecords_cat = $totalRecords_cat -> num_rows;
                                $totalPages_cat = ceil($totalRecords_cat / $item_page_cat); 
                                while ($row = mysqli_fetch_array($result_id)){
                            ?>
                                    <div class="dog-img">
                                        <a href="chitietthucung.php?id_dv=<?php echo $row['id_dv']; ?>"><img class="img" src="./img/<?php echo $row['hinhanh']; ?>"></a>
                                        <p class="text-boss">
                                            <a href="chitietthucung.php?id_dv=<?php echo $row['id_dv']; ?>"><?php echo $row['ten_dv']?></a>
                                        </p>
                                    </div>  
                            <?php } ?>  
                            <div class="page-container">  
                                <?php for($num_cat = 1; $num_cat <= $totalPages_cat; $num_cat++){ ?>
                                    <?php if($num_cat != $current_page_cat) {?>
                                        <div class="per-page">
                                            <a href="?per_page=<?=$item_page_cat?>&page=<?=$num_cat?> #cat" class="per-page-item"><?=$num_cat?></a>
                                        </div>
                                    <?php }else{?>
                                        <span class="current-item"><?=$num_cat?></span>
                                    <?php }?>
                                <?php }?>   
                            </div>                   
                        </div>
                    </div>

                    <div class="dog-h1" id="zoo">
                        <h1> Thú kiểng khác</h1>
                    </div>                
                    
                    <div class="dog-boss">
                        <div class="dog-item">              
                            <?php   
                                $item_page_thukieng = !empty($_GET['per_page_thukieng'])?$_GET['per_page_thukieng']:4;
                                $current_page_thukieng = !empty($_GET['page_thukieng'])?$_GET['page_thukieng']:1;
                                $offset_thukieng = ($current_page_thukieng - 1) * $item_page_thukieng;
                                $result_id = mysqli_query($conn, "SELECT * FROM dong_vat, loai_dv  WHERE dong_vat.id_loai_dv=loai_dv.id_loai_dv and dong_vat.ten_loai='thukieng' ORDER BY `id_dv` ASC LIMIT ".$item_page_thukieng." OFFSET ".$offset_thukieng."");
                                $totalRecords_thukieng = mysqli_query($conn, "SELECT * FROM dong_vat WHERE dong_vat.ten_loai='thukieng'");
                                $totalRecords_thukieng = $totalRecords_thukieng -> num_rows;
                                $totalPages_thukieng = ceil($totalRecords_thukieng / $item_page_thukieng); 
                                while ($row = mysqli_fetch_array($result_id)){
                            ?>
                                    <div class="dog-img">
                                        <a href="chitietthucung.php?id_dv=<?php echo $row['id_dv']; ?>"><img class="img" src="./img/<?php echo $row['hinhanh']; ?>"></a>
                                        <p class="text-boss">
                                            <a href="chitietthucung.php?id_dv=<?php echo $row['id_dv']; ?>"><?php echo $row['ten_dv']?></a>
                                        </p>
                                    </div>  
                            <?php } ?>  
                            <div class="page-container">  
                                <?php for($num_thukieng = 1; $num_thukieng <= $totalPages_thukieng; $num_thukieng++){ ?>
                                    <?php if($num_thukieng != $current_page_thukieng) {?>
                                        <div class="per-page">
                                            <a href="?per_page=<?=$item_page_thukieng?>&page=<?=$num_thukieng?>" class="per-page-item"><?=$num_thukieng?></a>
                                        </div>
                                    <?php }else{?>
                                        <span class="current-item"><?=$num_thukieng?></span>
                                    <?php }?>
                                <?php }?>   
                            </div>                   
                        </div>
                    </div>
                </div> 
            </div>     
        </div>

        <?php require './modal.php'?>
        <script src="./js/main.js"></script>
    
    </div>
    <div class="fotter">
        <div class="logo-fot">
            <div class="fast">
                <div class="sflash">
                    <i class="fas fa-truck"></i>
                    <p class="ship-wr"> Ship Toàn Quốc</p>
                </div>
                <div class="text-ship">
                    <p>
                        FreeShip cho đơn hàng từ 500k
                    </p>
                </div>
            </div>
            <div class="fast-id">
                <div class="lie-id">
                    <i class="fas fa-user-cog"></i>
                    <p class="lie"> Đổi trả linh động</p>
                </div>
                <div class="text-lie">
                    <p>
                        Trong vòng 7 ngày
                    </p>
                </div>
            </div>
            <div class="phone-mobile">
                <div class="phone-id">
                    <i class="fas fa-mobile-alt"></i>
                    <p class="phone"> Đặt hàng trực tuyến toàn quốc</p>
                </div>
                <div class="text-phone">
                    <p>
                        Ngay trên PetPark
                    </p>
                </div>
            </div>
            <div class="hotline">
                <div class="hotline-id">
                    <i class="fas fa-phone-alt"></i>
                    <p class="hotline-dh"> Hotline đặt hàng</p>
                </div>
                <div class="text-hotline">
                    <p>
                        0839032613
                    </p>
                </div>
            </div>
        </div>
        <div class="fotter-container">
            <div class="fotter-item">
                <div class="fotter-we">
                    <h3 class="we-h3">Về chúng tôi</h3>
                    <ul class="we-ul">
                        <li><a href="">Giới thiệu</a></li>
                        <li><a href="">Chính sách và quy định chung</a></li>
                        <li><a href="">Quy định và hình thức thanh toán</a></li>
                        <li><a href="">Chính sách bảo hành</a></li>
                        <li><a href="">Chính sách vận chuyển</a></li>
                        <li><a href="">Chính sách bảo mật thông tin cá nhân</a></li>
                        <li><a href="">Chính sách đổi trả và hoàn tiền</a></li>
                    </ul>
                </div>
                <div class="fotter-we">
                    <h3 class="we-h3">Mạng xã hội</h3>
                    <ul class="we-ul">
                        <li class="we-time">Hãy kết nối với chúng tôi</li>
                        <ul class="ul-icon">
                            <li class="icon-we"><a href=""><i class="fab fa-instagram-square"></i></a></li>
                            <li class="icon-we"><a href=""><i class="fab fa-facebook-square"></i></a></li>
                            <li class="icon-we"><a href=""><i class="fab fa-youtube-square"></i></a></li>
                            <li class="icon-we"><a href=""><i class="fab fa-google-plus-square"></i></a></li>
                        </ul>
                    </ul>
                </div>
                <div class="fotter-we">
                    <h3 class="we-h3">Hệ thống thú cưng pet park</h3>
                    <ul class="we-ul">
                        <li class="we-adress">Pet Park Quận 1</li>
                        <li><a href="">7 Trần Khắc Chân, P.Tân Định, Quận 1, TPHCM</a></li>
                        <li class="we-phone">Điện thoại: 0902 360 086</li>
                        <li class="we-adress">Pet Park Quận 4</li>
                        <li><a href="">313 Hoàng Diệu, P6, Quận 4, TPHCM</a></li>
                        <li class="we-phone">Điện thoại: 0903 11 48 22</li>
                        <li class="we-adress">Pet Park Võ Văn Tần</li>
                        <li><a href="">217 Võ Văn Tần, P5, Quận 3, TPHCM</a></li>
                        <li class="we-phone">Điện thoại: 0922 333 111</li>
                        <li class="we-time">Giờ mở cửa: Thứ Hai đến Thứ Bảy, 8h-22h</li>
                    </ul>
                </div>
                <div class="fotter-we">
                    <h3 class="we-h3">ĐĂNG KÝ NHẬN ƯU ĐÃI</h3>
                    <ul class="we-ul">
                        <li class="we-time">Hãy đăng ký email của <br> bạn  để cập nhật thông tin <br> khuyến mãi nhanh nhất từ<br> Petpark.1412@gmail.com</li>
                    </ul>
                    <div class="we-input">
                        <input type="text" class="input-email" name="" placeholder="Nhập email của bạn">
                        <button class="we-btn" Type="submit">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
