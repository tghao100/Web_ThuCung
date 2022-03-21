<?php 
    session_start();
    include 'ketnoi.php';
?>

<?php 
    switch ($_GET['action']){
        case "add":
            $result = update_cart(true);
            echo json_encode($result);
            break;
        default;
            break;
    }

    function update_cart($add = false){
        include 'ketnoi.php';
        foreach ($_POST['quanlity'] as $id_dv => $quanlity) {
            if($quanlity == 0){
                unset($_SESSION['cart'][$id_dv]);
            }else {
                if($add){
                    $_SESSION['cart'][$id_dv] += $quanlity;
                }else {
                    $_SESSION['cart'][$id_dv] = $quanlity;
                }   
                
                //Kiểm tra số lượng sản phẩm tồn kho
                $addDongvat = mysqli_query($conn, "SELECT `quanlity` FROM `dong_vat` WHERE `id_dv` = " . $id_dv);
                $row_dv = mysqli_fetch_assoc($addDongvat);
                if($_SESSION['cart'][$id_dv] > $row_dv['quanlity']){
                    $_SESSION['cart'][$id_dv] = $row_dv['quanlity'];
                    return array(
                        'status' => 0,
                        'message' => "Số lượng sản phẩm tồn kho chỉ còn: ".$row_dv['quanlity']." sản phẩm. Bạn vui lòng kiểm tra lại giỏ hàng!"
                    );
                }
                return array(
                    'status' => 1,
                    'message' => "Thêm sản phẩm vào giỏ hàng thành công"
                );
            }
        }
    }
?>    