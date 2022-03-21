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
    
<?php 
    session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include("ketnoi.php");
    $id_dv = $_GET['id_dv'];
    $sql_tc = "SELECT * FROM loai_dv";
    $query_tc = mysqli_query($conn, $sql_tc);
    
    $sql_up = "SELECT * FROM dong_vat where id_dv='$id_dv'";
    $query_up = mysqli_query($conn, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $ten_dv = $_POST['ten_dv'];
        $quanlity = $_POST['quanlity'];
        $ten_loai=$_POST['ten_loai'];
        $price = $_POST['price'];
        if($_FILES['hinhanh']['name']==''){
            $hinhanh=$row_up['hinhanh'];
        }else{
            $hinhanh=$_FILES['hinhanh']['name'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
            move_uploaded_file($hinhanh_tmp, './img/'.$hinhanh);
        }
        $id_loai_dv = $_POST['id_loai_dv'];
        $sql = "UPDATE dong_vat SET ten_dv='$ten_dv', quanlity = '$quanlity', ten_loai='$ten_loai', hinhanh='$hinhanh', price='$price', id_loai_dv='$id_loai_dv' WHERE id_dv=$id_dv";
        $query = mysqli_query($conn, $sql);
        header('location: dsdv.php?ten_loai=cho.php');
    }  
?>
<div class="card">
    <div class="card-container">
        <div class="add-h2">
            <h2>Sửa Thông Tin Thú Cưng</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="add-body">
                    <label for="" class="add-label">
                        <input type="text" class="form-input" name="ten_dv" placeholder="Nhập tên loại thú cưng" value="<?php echo $row_up['ten_dv'];?>">
                        <i class="fas fa-file-signature"></i>
                    </label>

                    <label for="" class="add-label">
                        <input type="number" class="form-input" name="ten_dv" placeholder="Nhập số lượng thú cưng" value="<?php echo $row_up['ten_dv'];?>">
                        <i class="fas fa-edit"></i>
                    </label>

                    <label for="" class="add-label">
                        <input type="number" class="form-input" name="price" placeholder="Nhập giá bán thú cưng" value="<?php echo $row_up['price'];?>">
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
                        <input type="file" name="hinhanh" class="form-input" value="<?php echo $row_up['hinhanh']; ?>">
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
</div>
</body>
</html>