<?php 
    session_start();             
    header("Content-Type: text/html; charset-UTF-8");
    include 'ketnoi.php';
    $id = $_GET['id_dv'];
    $sql_chitiet = "SELECT * FROM dong_vat WHERE dong_vat.id_dv AND dong_vat.id_dv = '$id'";
    $query_chitiet = mysqli_query($conn, $sql_chitiet);
    $r_dv = mysqli_fetch_array($query_chitiet);

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
    <div class="boss">
        <?php require './header.php'?>
        <?php require './modal.php'?>
        <script src="./js/main.js"></script>
    </div>    
    <div class="boss-main">
        <div class="body-main">
            <div class="body-container">
                <div class="body-img">
                    <p><img src="./img/<?php echo $r_dv['hinhanh']; ?>"></p>   
                </div>
                <div class="body-info">
                    <p class="info-name"><?php echo $r_dv['ten_dv']; ?></p>
                    <p class="info-price"><?php echo number_format ($r_dv['price'],0,'','.'); ?><span>đ</span></p>
                    <?php if($r_dv['quanlity'] > 0) {?>
                    <p class="quanlity">Số lượng tồn kho: <?php echo $r_dv['quanlity'] ?></p>
                    <form action="giohang.php?action=add" class="info-cart js-info-cart" method="POST">
                        <div class="info-btn">
                            <input class='info-up-down' onclick='var result = document.getElementById("quantity"); var qty = result.value; if( !isNaN(qty) && qty > 1 ) result.value--;return false;' type='button' value='-'>
                            <input type="text" id="quantity" name="quanlity[<?=$r_dv['id_dv']?>]" class="info-input" value="1">
                            <input class='info-up-down' onclick="var result = document.getElementById('quantity'); var qty = result.value; if( !isNaN(qty)) result.value++;return false;" type='button' value='+'>
                        </div>
                        <?php 
                            if(!isset($_SESSION['username'])){?>
                                <p class="cart-item" onclick="alert('Bạn cần đăng nhập hoặc đăng ký tài khoản mới. Để có thể sử dụng chức năng này!')">Thêm vào giỏ</p>
                            <?php }else{?>
                            <button class="cart-item" type="submit">Thêm vào giỏ</button>
                        <?php } ?>
                    </form>
                    <?php }else{?>
                        <p class="end-quanlity">Hết hàng</p>
                    <?php } ?>
                    <div class="info-text">
                        <h2 class="text-onl">Ưu đãi dành cho khách hàng đặt Online:</h2>

                        <ul class="info-sale">
                            <li><i class="fas fa-paw sale-animal"></i> Giữ hàng tại Shop cho khách đặt hàng online</li>
                            <li><i class="fas fa-paw sale-animal"></i> Giao hàng toàn quốc</li>
                            <li><i class="fas fa-paw sale-animal"></i> Tư vấn miễn phí 24/7</li>
                            <li><i class="fas fa-paw sale-animal"></i> Bảo hành nhanh chóng</li>
                            <li><i class="fas fa-paw sale-animal"></i> Freeship cho đơn hàng trên 500k</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-container">
                <?php require './tab_ui.php'; ?>
            </div>    
        </div>
    </div>

    <div class="end-boss">
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
                        <li><a href="">Số 7 Trần Khắc Chân, P.Tân Định, Quận 1, TPHCM</a></li>
                        <li class="we-phone">Điện thoại: 0902 360 086</li>
                        <li class="we-adress">Pet Park Quận 4</li>
                        <li><a href="">Số 313 Hoàng Diệu, P6, Quận 4, TPHCM</a></li>
                        <li class="we-phone">Điện thoại: 0903 11 48 22</li>
                        <li class="we-adress">Pet Park Võ Văn Tần</li>
                        <li><a href="">Số 217 Võ Văn Tần, P5, Quận 3, TPHCM</a></li>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script> 
        $(".js-info-cart").submit(function(event){
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: './ajax-cart.php?action=add',
                data: $(this).serializeArray(),
                success: function(response){
                    response = JSON.parse(response);
                    if(response.status == 0){
                        alert(response.message);
                    }else{
                        alert(response.message);
                        window.location.reload();
                    }
                }
            });
        });
    </script>
</body>
</html>