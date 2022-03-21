
<?php 
    session_start();
    include("ketnoi.php");
    if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
    $id = $_GET['id'];
    $sql = "DELETE FROM slide_show where id = $id";
    $query = mysqli_query($conn, $sql);
    if ($conn->query($sql) === TRUE) {
        header("location: admin.php");
        } else {
        echo "Lỗi không Xóa được!";
        }
    }
?>