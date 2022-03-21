
<?php 
    session_start();
    include("ketnoi.php");
    if(isset($_REQUEST['id_dv']) and $_REQUEST['id_dv']!=""){
    $id_dv = $_GET['id_dv'];
    $sql = "DELETE FROM dong_vat where id_dv = $id_dv";
    $query = mysqli_query($conn, $sql);
    if ($conn->query($sql) === TRUE) {
        header("location: dsdv.php?ten_loai=cho.php");
        } else {
        echo "Lỗi không Xóa được!";
        }
    }
?>