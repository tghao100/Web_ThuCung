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
    $id = $_GET['id'];
    $sql_up = "SELECT * FROM slide_show where id='$id'";
    $query_up = mysqli_query($conn, $sql_up);
    $row = mysqli_fetch_assoc($query_up);

    if(isset($_POST['sbm'])){
        $tenthucung = $_POST['tenthucung'];
        if($_FILES['hinhanh']['name']==''){
            $hinhanh=$row_up['hinhanh'];
        }else{
            $hinhanh=$_FILES['hinhanh']['name'];
            $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
            move_uploaded_file($hinhanh_tmp, './img/'.$hinhanh);
        }
        $sql = "UPDATE slide_show SET tenthucung='$tenthucung', hinhanh='$hinhanh' WHERE id='$id'";
        $query = mysqli_query($conn, $sql);
        header('location: admin.php');
    }  
?>
<div class="card">
    <div class="card-container">
        <div class="add-h2">
            <h2>Thêm Slide</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="add-body">
                    <label for="" class="add-label">
                        <input type="file" name="hinhanh" class="form-input">
                    </label>
                        
                    <label for="" class="add-label">
                        <input type="text" class="form-input" name="tenthucung" placeholder="Nhập tên thú cưng" value="<?php echo $row['tenthucung'];?>">
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