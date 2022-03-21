<?php 
    session_start();
    include './ketnoi.php';
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
    <?php 
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        $success = false;
        $error = false;
        if(isset($_GET['action'])){
            function update_cart($add = false){
                include './ketnoi.php';
                foreach ($_POST['quanlity'] as $id_dv => $quanlity) {
                    if($quanlity == 0){
                        unset($_SESSION['cart'][$id_dv]);
                    }else {
                        if($add){
                            $_SESSION['cart'][$id_dv] += $quanlity;
                        }else {
                            $_SESSION['cart'][$id_dv] = $quanlity;
                        }   
                    }
                    // $addDongvat = mysqli_query($conn, "SELECT `quanlity` FROM `dong_vat` WHERE `id_dv` = " . $id_dv);
                    // $row_dv = mysqli_fetch_assoc($addDongvat);
                    // if($_SESSION['cart'][$id_dv] > $row_dv['quanlity']){
                    //     $_SESSION['cart'][$id_dv] = $row_dv['quanlity'];
                    // }
                }
            }
            switch ($_GET['action']){
                case "add":
                    update_cart(true);
                        header('location: ./giohang.php');
                    break;
                case "xoa":
                    if(isset($_GET['id_dv'])){
                        unset($_SESSION['cart'][$_GET['id_dv']]);
                    }
                    header('location: ./giohang.php');
                    break;
                case "submit":
                    if(isset($_POST['update-inp'])){
                        update_cart();
                        header('location: ./giohang.php');
                    }elseif(isset($_POST['orders-click'])){
                        if(empty($_POST['name_orders'])){
                            $error = "Bạn chưa nhập họ và tên người nhận!";
                            echo "<script>alert('$error');window.location = './giohang.php';</script>";
                            exit;
                        }elseif(empty($_POST['phone'])){
                            $error = "Bạn chưa nhập số điện thoại người nhận!";
                            echo "<script>alert('$error');window.location = './giohang.php';</script>";
                            exit;
                        }elseif(empty($_POST['email'])){
                            $error = "Bạn chưa nhập email người nhận!";
                            echo "<script>alert('$error');window.location = './giohang.php';</script>";
                            exit;
                        }elseif(empty($_POST['adress'])){
                            $error = "Bạn chưa nhập địa chỉ người nhận!";
                            echo "<script>alert('$error');window.location = './giohang.php';</script>";
                            exit;
                        }
    
                        if($error==false && !empty($_POST['quanlity'])){
                            $query = mysqli_query($conn, "SELECT * FROM dong_vat WHERE id_dv IN(".implode(",", array_keys($_POST['quanlity'])).")");
                            $total = 0;
                            $name_orders = $_POST['name_orders'];
                            $phone = $_POST['phone'];
                            $email = $_POST['email'];
                            $adress = $_POST['adress'];
                            $note = $_POST['note'];
                            $orders_dv = array();
                            $updateString = "";
                            while($row = mysqli_fetch_array($query)){
                                $orders_dv[] = $row;
                                if($_POST['quanlity'][$row['id_dv']] > $row['quanlity']){
                                    $_POST['quanlity'][$row['id_dv']] == $row['quanlity'];
                                }else{
                                    $total += $row['price'] * $_POST['quanlity'][$row['id_dv']];
                                    $updateString .= " WHEN id_dv = ".$row['id_dv']." THEN quanlity - ".$_POST['quanlity'][$row['id_dv']];                
                                }
                            }    
                            $result = mysqli_query($conn, "SELECT * FROM user");
                            $row_user = mysqli_fetch_array($result);
                            $id_khachhang = $row_user['id_user'];
                            $updateQuanlity = mysqli_query($conn, "UPDATE `dong_vat` SET quanlity = CASE ".$updateString." END WHERE id_dv IN (".implode(",", array_keys($_POST['quanlity'])).")");
                            $sql_in = mysqli_query($conn, "INSERT INTO `orders` (`id`, `id_khachhang`, `name_orders`, `phone`, `email`, `adress`, `note`, `total`, `time`, `last_update`) VALUES (NULL,'$id_khachhang', '$name_orders', '$phone', '$email', '$adress', '$note', '$total', '".time()."', '".time()."')");                            
                            $ordersID = $conn->insert_id;
                            foreach ($orders_dv as $key => $result_cart) {
                                $sql_ins = mysqli_query($conn ,"INSERT INTO `orders_detail` (`id`, `id_orders`, `id_dv`, `quanlity`, `price`, `time`, `last_update`) VALUES (NULL, '$ordersID', '".$result_cart['id_dv']."', '".$_POST['quanlity'][$result_cart['id_dv']]."', '".$result_cart['price']."', '".time()."', '".time()."')");
                                unset($_SESSION['cart']); 
                            }
                        }


                        if(!empty($success)){
                            header('location: ./index.php');
                        }else {
                            echo'
                            <div class="victory-boss">
                                <div class="victory-container">
                                    <div class="victory-item">
                                        <div class="victory-card">
                                            <P>Bạn đã đặt hàng thành công (-.-)</P>
                                            <div class="victory-a">
                                                <a href="./index.php">Tiếp tục mua hàng</a>
                                            </div>    
                                        </div>
                                    </div>
                                    <div class="victory-img"><a href="#"><img src="./img/corgi-dong.gif"></a></div>
                                </div>
                            </div>'; exit;    
                        }
                    }
                    break; 
            }
        }   
    ?>    
    <div class="boss">  
        <?php require './header.php' ?>
        <?php require './modal.php'?>
        <script src="./js/main.js"></script>

        <?php if(!empty($_SESSION['cart'])){
            $sql = "SELECT * FROM dong_vat WHERE id_dv IN (".implode(",", array_keys($_SESSION['cart'])).")";
            $result_cart = mysqli_query($conn, $sql);
        }else{?>
            <div class="product-cart-container">
                <div class="product-cart-item">
                    <div class="product-cart-card">
                        <p>Chưa có sản phẩm trong giỏ hàng.</p>
                        <a href="./index.php">Quay trở lại Cửa hàng</a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="cart-container">
            <form action="giohang.php?action=submit" method="POST">
                <?php if(!empty($result_cart)){?>
                    <div class="container-cart">
                        <div class="item-cart">
                            <table class="cart-table">
                                <thead>
                                    <tr class="cart-th"> 
                                        <th>SẢN PHẨM</th>
                                        <th>Thông Tin</th>
                                        <th>GIÁ</th>
                                        <th>SỐ LƯỢNG</th>
                                        <th>Thành tiền</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $total = 0;
                                        while ($row_cart = mysqli_fetch_array($result_cart)) {?>
                                            <tr class="cart-tr">
                                                <td class="product-name"><img src="./img/<?php echo $row_cart['hinhanh']; ?>"></td>
                                                <td class="product-info"><?php echo $row_cart['ten_dv']?></td>
                                                <td class="product-price"><p><?php echo number_format ($row_cart['price'],0,'','.'); ?><span>đ</span></p></td>
                                                <td class="product-quanlity">
                                                    <div class="cart-quanlity-btn">
                                                        <input type="number" name="quanlity[<?=$row_cart['id_dv']?>]"class="cart-info-input" value="<?=$_SESSION['cart'][$row_cart['id_dv']]?>">
                                                    </div>
                                                </td>
                                                <td class="product-price"><p><?php echo number_format ($row_cart['price'] * $_SESSION['cart'][$row_cart['id_dv']],0,'','.') ?><span>đ</span></p></td>
                                                <td class="product-remove"><a href="giohang.php?action=xoa&id_dv=<?php echo $row_cart['id_dv']?>">x</a></td>
                                            </tr>   
                                    <?php 
                                        $total += $row_cart['price'] * $_SESSION['cart'][$row_cart['id_dv']];
                                    }?>   
                                </tbody>
                            </table>

                            <div class="continue-container">
                                <div class="continue-item">
                                    <a href="index.php" class="continue-btn"><i class="fa-solid fa-arrow-left-long"></i>   Tiếp tục xem sản phẩm</a>
                                    <button class="update-sbm" type="submit" name="update-inp">Cập nhật</button>
                                </div>
                            </div>
                        </div>  
                        <div class="cart-buy">
                            <div class="cart-buy-h2">
                                <h2>Cộng giỏ hàng</h2>
                            </div>
                            <table class="provisional-table">
                                <tbody>
                                    <tr>
                                        <th class="provisional-item">Tổng</th>
                                        <td class="provisional-money"><?php echo number_format ($total,0,'','.') ?><span>đ</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="buy-cart"><span class="buy-cart-btn js-buy-cart-btn">Tiến hành thanh toán</span></div>
                        </div>
                    </div>
                <?php }?>   
                <div class="modal-cart js-modal-cart">
                    <div class="modal-cart-container js-modal-cart-comtainer">
                        <div class="modal-cart-close js-cart-close">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="modal-header">
                            <p class="header-signin">Nhập thông tin đặt hàng</p>
                        </div>
                        <div class="modal-body">
                            <label for="" class="modal-label">
                                <input type="text" class="form-input" name="name_orders" placeholder="Nhập họ và Tên">
                                <i class="fas fa-user orders-icon"></i>
                            </label>  
                            <label for="" class="modal-label">
                                <input type="number" class="form-input clean" name="phone" placeholder="Nhập số điện thoại">
                                <i class="fa-solid fa-phone orders-icon"></i>
                            </label>
                            <label for="" class="modal-label">
                                <input type="text" class="form-input" name="email" placeholder="Nhập email">
                                <i class="fa-solid fa-envelope orders-icon"></i>
                            </label>
                            <label for="" class="modal-label">
                                <input type="text" class="form-input" name="adress" placeholder="Nhập địa chỉ nhận hàng">
                                <i class="fas fa-address-card orders-icon"></i>
                            </label>
                            <label for="" class="modal-label">
                                <input type="text" class="form-input" name="note" placeholder="Ghi chú">
                                <i class="fas fa-clipboard orders-icon"></i>
                            </label>
                            <div class="provisional-item-btn">
                                <button type="submit" class="provisional-btn" name="orders-click">Đặt hàng</button>
                            </div>
                        </div>    
                    </div>
                </div> 
            </form>  
            <script src="./js/buy.js"></script>
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
    </div>
</body>
</html>