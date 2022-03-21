
<?php 
     session_start();
    header("Content-Type: text/html; charset-UTF-8");
    include 'ketnoi.php';
    if(isset($_POST['sbm'])){
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $tenthucung = $_POST['tenthucung'];
        $sql = "INSERT INTO slide_show (hinhanh, tenthucung) VALUES ('$hinhanh','$tenthucung')";
        $query = mysqli_query($conn, $sql);
        move_uploaded_file($hinhanh_tmp, './img/'.$hinhanh);
        if($query){
            header('location: admin.php');
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Slide_Show</title>
    <link rel="stylesheet" href="./css/admin.css">
    <link rel="stylesheet" href="./font/fontawesome/css/all.css">
</head>
<body>
<div class="card">
    <div class="card-container">
        <div class="add-h2">
            <h2>Thêm Slide</h2>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="add-body">
                    <label for="" class="add-label">
                        <input type="file" name="hinhanh"  class="form-input" placeholder="Hình ảnh">
                    </label>
                        
                    <label for="" class="add-label">
                        <input type="text" class="form-input" name="tenthucung" placeholder="Nhập tên thú cưng">
                        <i class="fas fa-file-signature"></i>
                    </label>
        
                    <button name="sbm" class="add-btn" type="submit">Thêm</button>
                </div>
            </form>
        </div>
    </div>   
</div>
</body>
</html>