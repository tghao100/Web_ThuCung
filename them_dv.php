<?php 
    include 'ketnoi.php';
    header("Content-Type: text/html; charset-UTF-8");
    $sql_tc = "SELECT * FROM loai_dv";
    $query_tc = mysqli_query($conn, $sql_tc);

    if(isset($_POST['sbm'])){
        $ten_dv = $_POST['ten_dv'];
        $ten_loai=$_POST['ten_loai'];
        $quanlity = $_POST['quanlity'];
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $price = $_POST['price'];
        $id_loai_dv = $_POST['id_loai_dv'];
        $sql = "INSERT INTO dong_vat(ten_dv, quanlity, ten_loai, price, hinhanh, id_loai_dv) VALUES ('$ten_dv', '$quanlity', '$ten_loai', '$price', '$hinhanh', '$id_loai_dv')";
        $query = mysqli_query($conn, $sql);
        move_uploaded_file($hinhanh_tmp, './img/'.$hinhanh);
        if($query_tc){
            header('location: dsdv.php?ten_loai=cho.php');
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" hreflink="./font/fontawesome/css/all.css"> 
    <link rel="stylesheet" href="./font/fontawesome/css/all.min.css">
    <title>Thêm Thú Cưng</title>
</head>
<body>
    <div class="card">
        <div class="card-container">
            <div class="add-h2">
                <h2>Thêm Thú Cưng</h2>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <div class="add-body">
                    <label for="" class="add-label">
                        <input type="text" class="form-input" name="ten_dv" placeholder="Nhập tên loại thú cưng">
                        <i class="fas fa-file-signature"></i>
                    </label>

                    <label for="" class="add-label">
                        <input type="number" class="form-input" name="quanlity" placeholder="Nhập số lượng thú cưng">
                        <i class="fas fa-edit"></i>
                    </label>

                    <label for="" class="add-label">
                        <input type="number" class="form-input" name="price" placeholder="Nhập giá bán thú cưng">
                        <i class="fas fa-money-bill-alt"></i>
                    </label>
                            
                    <label for="" class="add-label">
                        <select class="form-input" name="ten_loai">
                                <option value="" selected="selected">--Chọn loại thú cưng--</option>
                                <option value="cho">Chó</option>
                                <option value="meo">Mèo</option>
                                <option value="thukieng">Thú Cưng Khác</option>
                        </select>
                    </label>

                    <label for="" class="add-label">
                        <input type="file" name="hinhanh"  class="form-input" placeholder="Hình ảnh">
                    </label>
                        
                    <label for="" class="add-label">
                        <select class="form-input" name="id_loai_dv" required>
                            <option value="" selected="selected">--Chọn giống loài thú cưng--</option>
                            <?php                   
                                    while($row = mysqli_fetch_assoc($query_tc)){?>
                                    <option value="<?php echo $row['id_loai_dv'];?>"><?php echo $row['ten_loai_dv']?></option>   
                            <?php }?>
                        </select>
                    </label>
                    <button name="sbm" class="add-btn" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>